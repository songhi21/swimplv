<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Psy\Readline\Hoa\Console;

class pressuresensorControlleradmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ps');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.ps.show')->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getDatadevicelist(Request $request)
    {
        try {
            // Retrieve parameters from DataTables
            $start = $request->input('start');
            $length = $request->input('length');

            // Fetch all device IDs concurrently
            $deviceIds = $this->fetchAllDeviceIds();

            // Process device data concurrently using curl_multi
            $deviceData = $this->fetchDeviceDataConcurrently($deviceIds);

            // Prepare data for DataTables
            $result = array_map(function ($data) {
                return array_merge($data, [
                    'Devicetype' => 'Pressure sensor',
                    'devicename' => $this->getDeviceName($data['id']),
                ]);
            }, $deviceData);

            // Apply pagination
            $filteredResult = array_slice($result, $start, $length);

            // Return JSON response for DataTables
            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => count($result),
                "recordsFiltered" => count($result),
                "data" => $filteredResult
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function fetchAllDeviceIds(): array
    {
        $response = Http::get('http://111.19.141.81:8089/a/api/appdevice', [
            'appkey' => 'a46fa5b580fb44dba690c545e7a24371',
            'secret' => 'E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH',
        ]);

        return $response->json()['data'] ?? [];
    }

    private function fetchDeviceDataConcurrently(array $deviceIds): array
    {
        $mh = curl_multi_init();
        $curlHandles = [];

        foreach ($deviceIds as $deviceId) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$deviceId");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($mh, $ch);
            $curlHandles[$deviceId] = $ch;
        }

        $active = null;
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);

        while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($mh) == -1) {
                usleep(100);
            }
            do {
                $mrc = curl_multi_exec($mh, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }

        $deviceData = [];
        foreach ($curlHandles as $deviceId => $ch) {
            $response = curl_multi_getcontent($ch);
            $data = json_decode($response, true);
            if (isset($data['data']) && is_array($data['data'])) {
                $deviceData[] = $data['data'];
            }
            curl_multi_remove_handle($mh, $ch);
        }

        curl_multi_close($mh);

        return $deviceData;
    }

    private function getDeviceName($deviceId)
    {
        $deviceNames = [
            '233614970' => 'Pressure Sensor 1 (Bar)',
            '233614971' => 'Pressure Sensor 2 (Bar)',
            '233614969' => 'Pressure Sensor 3 (Bar)',
            '233614968' => 'Pressure Sensor 4 (Bar)'
        ];
        return $deviceNames[$deviceId] ?? '';
    }

    public function getDatadevicevalue(Request $request, $id)
    {
        try {
            // Retrieve search value
            $searchValue = $request->input('search.value');

            // Fetch device information concurrently
            $deviceData = $this->fetchDeviceDataConcurrently([$id])[0] ?? [];

            // Process response
            $result = [];
            if ($searchValue === '' || stripos(implode(' ', $deviceData), $searchValue) !== false) {
                $result = array_merge($deviceData, [
                    'devicename' => $this->getDeviceName($id),
                ]);
            }

            // Return response
            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => count($result) > 0 ? 1 : 0,
                "recordsFiltered" => count($result) > 0 ? 1 : 0,
                "data" => $result
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getDatadevicehistoricaldata(Request $request, $id)
    {
        try {
            // Retrieve pagination parameters
            $paginationStart = intval($request->input('start'));
            $paginationLength = intval($request->input('length'));

            // Retrieve date range parameters (with defaults)
            $dateStart = $request->input('date_start') ?? Carbon::now()->startOfMonth()->toDateTimeString();
            $dateEnd = $request->input('date_end') ?? Carbon::now()->endOfMonth()->toDateTimeString();

            // Fetch historical data
            $response = Http::get("http://111.19.141.81:8089/a/api/devhistory", [
                'appkey' => 'a46fa5b580fb44dba690c545e7a24371',
                'secret' => 'E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH',
                'deviceid' => $id,
                'start' => $dateStart,
                'end' => $dateEnd,
                'size' => 300, // Adjust as needed
                'no' => 1,
            ]);

            // Process data for DataTables
            $data = $response->json()['data'] ?? [];
            $result = array_map(function ($item) use ($id) {
                return [
                    'deviceid' => $id,
                    "devicename" => $this->getDeviceName($id),
                    'numericalvalue' => $item['value'],
                    'datetime' => $item['time'],
                    // ... other fields ...
                ];
            }, $data);

            // Apply pagination
            $filteredResult = array_slice($result, $paginationStart, $paginationLength);

            // Return response
            return response()->json([
                "draw" => intval($request->input('draw')),
                'recordsTotal' => count($result),
                'recordsFiltered' => count($result),
                'data' => $filteredResult,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

//     public function getDatadevicelist(Request $request)
//     {
// //         try {
// //             // Retrieve parameters sent by DataTables
// //             $start = $request->input('start');
// //             $length = $request->input('length');
// //             $searchValue = $request->input('search.value'); // Get the search term
        
// //             // Fetch data for all devices in a single request
// //             $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');
// //             $psjson = json_decode($psdevicelist->body(), true);
// //             $psdata = $psjson['data'] ?? [];
        
// //             // Process data for DataTables
// //             $result = [];
// //             foreach ($psdata as $key => $value) {
// //                 // Fetch data for each device
// //                 $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$value");
// //                 $resultvalue = json_decode($deviceinfo->body(), true);
// // ;
// //                 // Filter data based on search value
// //                 if (isset($resultvalue['data']) && is_array($resultvalue['data'])) {
// //                     // Check if 'status' key exists
// //                     $status = $resultvalue['status'] ?? '';
        
// //                     // Convert array data to string for searching
// //                     $stringValue = implode(' ', $resultvalue['data']);
// //                     // echo $resultvalue['data'];
                
// //                     // Check if search value matches "online" or "offline" status
// //                     if (($searchValue == 'online' || $searchValue == 'offline') && $status == $searchValue) {
// //                         $pressname = ["Devicetype" => "Pressure sensor"];
// //                         $devicename = ["devicename" => ($resultvalue['data']['id'] == '233614970') ? "Pressure Sensor 1 (Bar)" :
// //                                     (($resultvalue['data']['id']  == '233614971') ? "Pressure Sensor 2 (Bar)" :
// //                                     (($resultvalue['data']['id'] == '233614969') ? "Pressure Sensor 3 (Bar)" :
// //                                     (($resultvalue['data']['id'] == '233614968') ? "Pressure Sensor 4 (Bar)" : "")))];
                        
// //                         $deviceData = array_merge($resultvalue['data'], $pressname, $devicename);
// //                         $result[] = $deviceData;
// //                     } elseif (stripos($stringValue, $searchValue) !== false) {
// //                         $devicename = ["devicename" => ($resultvalue['data']['id'] == '233614970') ? "Pressure Sensor 1 (Bar)" :
// //                                     (($resultvalue['data']['id']  == '233614971') ? "Pressure Sensor 2 (Bar)" :
// //                                     (($resultvalue['data']['id'] == '233614969') ? "Pressure Sensor 3 (Bar)" :
// //                                     (($resultvalue['data']['id'] == '233614968') ? "Pressure Sensor 4 (Bar)" : "")))];
// //                         $pressname = ["Devicetype" => "Pressure sensor"];
// //                         $deviceData = array_merge($resultvalue['data'], $pressname, $devicename);
// //                         $result[] = $deviceData;
// //                     }
                    
// //                 }
// //             }
        
// //             // Apply pagination after filtering
// //             $filteredResult = array_slice($result, $start, $length);
        
// //             // Return the filtered result to DataTables.js
// //             return response()->json([
// //                 "draw" => intval($request->input('draw')),
// //                 "recordsTotal" => count($result), // Total records without filtering
// //                 "recordsFiltered" => count($result), // Total records with filtering (assuming no filtering is done here)
// //                 "data" => $filteredResult
// //             ]);
// //         } catch (\Exception $e) {
// //             return response()->json(['error' => $e->getMessage()], 500);
// //         }
//             try {
//                 // Retrieve parameters sent by DataTables
//                 $start = $request->input('start');
//                 $length = $request->input('length');

//                 // Fetch data for all devices in a single request
//                 $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');
//                 $psjson = json_decode($psdevicelist->body(), true);
//                 $psdata = $psjson['data'] ?? [];

//                 // Process data for DataTables
//                 $result = [];
//                 $curlHandles = [];
//                 $mh = curl_multi_init();
                
//                 foreach ($psdata as $value) {
//                     // Create curl handle for each device
//                     $ch = curl_init();
//                     curl_setopt($ch, CURLOPT_URL, "http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$value");
//                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                     curl_multi_add_handle($mh, $ch);
//                     $curlHandles[$value] = $ch;
//                 }

//                 // Execute all curl handles concurrently
//                 $active = null;
//                 do {
//                     $mrc = curl_multi_exec($mh, $active);
//                 } while ($mrc == CURLM_CALL_MULTI_PERFORM);

//                 while ($active && $mrc == CURLM_OK) {
//                     if (curl_multi_select($mh) == -1) {
//                         usleep(100);
//                     }
//                     do {
//                         $mrc = curl_multi_exec($mh, $active);
//                     } while ($mrc == CURLM_CALL_MULTI_PERFORM);
//                 }

//                 // Process the responses
//                 foreach ($curlHandles as $value => $ch) {
//                     $response = curl_multi_getcontent($ch);
//                     $resultvalue = json_decode($response, true);

//                     if (isset($resultvalue['data']) && is_array($resultvalue['data'])) {
//                         // Check if 'status' key exists
//                         $status = $resultvalue['status'] ?? '';

//                         // Merge additional data
//                         $pressname = ["Devicetype" => "Pressure sensor"];
//                         $devicename = ["devicename" => $this->getDeviceName($resultvalue['data']['id'])];
//                         $deviceData = array_merge($resultvalue['data'], $pressname, $devicename);

//                         $result[] = $deviceData;
//                     }
//                     curl_multi_remove_handle($mh, $ch);
//                 }

//                 curl_multi_close($mh);

//                 // Apply pagination after filtering
//                 $filteredResult = array_slice($result, $start, $length);

//                 // Return the filtered result to DataTables.js
//                 return response()->json([
//                     "draw" => intval($request->input('draw')),
//                     "recordsTotal" => count($result), // Total records without filtering
//                     "recordsFiltered" => count($result), // Total records with filtering (assuming no filtering is done here)
//                     "data" => $filteredResult
//                 ]);
//             } catch (\Exception $e) {
//                 return response()->json(['error' => $e->getMessage()], 500);
//             }

//     }
    
//     private function getDeviceName($deviceId) {
//         $deviceNames = [
//             '233614970' => 'Pressure Sensor 1 (Bar)',
//             '233614971' => 'Pressure Sensor 2 (Bar)',
//             '233614969' => 'Pressure Sensor 3 (Bar)',
//             '233614968' => 'Pressure Sensor 4 (Bar)'
//         ];

//         return $deviceNames[$deviceId] ?? '';
//     }
    
//     public function getDatadevicevalue(Request $request, $id)
//     {
//         // try {
//         //     // Retrieve parameters sent by DataTables
//         //     // $start = $request->input('start');
//         //     // $length = $request->input('length');
//         //     $searchValue = $request->input('search.value'); // Get the search term

//         //     // Fetch your data from the server or database
//         //     $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');

//         //     $psjson = json_decode($psdevicelist->body(), true);
//         //     $psdata = $psjson['data'] ?? [];

//         //     // Process data for DataTables
//         //     $result = [];
//         //     $id = $id;
//         //     $deviceNames = [
//         //         '233614970' => 'Pressure Sensor 1 (Bar)',
//         //         '233614971' => 'Pressure Sensor 2 (Bar)',
//         //         '233614969' => 'Pressure Sensor 3 (Bar)',
//         //         '233614968' => 'Pressure Sensor 4 (Bar)'
//         //     ];
                    
//         //     foreach ($psdata as $key => $value) {
//         //         $devicename = isset($deviceNames[$id]) ? $deviceNames[$id] : '';
//         //         if ($value == $id) {
//         //             // If there's a match, set the $id variable to the matching value
//         //             $id = $value;
//         //             // break; // Exit the loop once a match is found
//         //         }
//         //         $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$id");
//         //         $resultvalue = json_decode($deviceinfo->body(), true); // Access the body of the HTTP response
//         //         $result = $resultvalue['data'] + ["devicename" => $devicename];
                
            
//         //     }
//         //     $filteredResult = $result;
//         //     // Apply pagination after filtering
        
//         //     // return $filteredResult;
//         //     // Return the filtered result to DataTables.js
            
//         //     return response()->json([
//         //         "draw" => intval($request->input('draw')),
//         //         "recordsTotal" => count($result), // Total records without filtering
//         //         "recordsFiltered" => count($result), // Total records with filtering (assuming no filtering is done here)
//         //         "data" => $filteredResult
//         //     ]);
                
//         // } catch (\Exception $e) {
//         //     return response()->json(['error' => $e->getMessage()], 500);
//         // }
//         try {
//             // Retrieve search value
//             $searchValue = $request->input('search.value');
    
//             // Device names
//             $deviceNames = [
//                 '233614970' => 'Pressure Sensor 1 (Bar)',
//                 '233614971' => 'Pressure Sensor 2 (Bar)',
//                 '233614969' => 'Pressure Sensor 3 (Bar)',
//                 '233614968' => 'Pressure Sensor 4 (Bar)'
//             ];
    
//             // Fetch device information
//             $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$id");
//             $deviceData = json_decode($deviceinfo->body(), true);
    
//             // Process response
//             $result = [];
    
//             // Check if search value matches or is empty
//             if ($searchValue === '' || stripos(implode(' ', $deviceData['data']), $searchValue) !== false) {
//                 // Include device name in the result
//                 $result = $deviceData['data'];
//                 $result['devicename'] = $deviceNames[$id] ?? ''; // Get the device name corresponding to the $id
//             }
    
//             // Return response
//             return response()->json([
//                 "draw" => intval($request->input('draw')),
//                 "recordsTotal" => count($result) > 0 ? 1 : 0, // Total records
//                 "recordsFiltered" => count($result) > 0 ? 1 : 0, // Filtered records
//                 "data" => $result // Data for the requested ID including device name
//             ]);
//         } catch (\Exception $e) {
//             // Handle exception
//             return response()->json(['error' => $e->getMessage()], 500);
//         }

//     }
//     public function getDatadevicehistoricaldata(Request $request, $id)
//     {

//         // try {
//         //     // Retrieve pagination parameters from the request
//         //     $paginationStart = intval($request->input('start'));
//         //     $paginationLength = intval($request->input('length'));
//         //     // $idvalue = $id;
//         //     // return $id;
//         //     // Retrieve date range parameters from the request
//         //     $dateStart = $request->input('date_start');
//         //     $dateEnd = $request->input('date_end');
            

//         //     // If date range is not submitted or conflicts, adjust them accordingly
//         //     if (!$dateStart || !$dateEnd || $dateStart >= $dateEnd) {
//         //         $dateStart = Carbon::now()->startOfMonth()->toDateTimeString();
//         //         $dateEnd = Carbon::now()->endOfMonth()->toDateTimeString();
//         //         // return $dateStart;
//         //     }

//         //     // Fetch data from the API
//         //     $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice', [
//         //         'appkey' => 'a46fa5b580fb44dba690c545e7a24371',
//         //         'secret' => 'E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH',
//         //     ]);

//         //     $psjson = json_decode($psdevicelist->body(), true);
//         //     $psdata = $psjson['data'] ?? [];

//         //     // Process data for DataTables
//         //     $result = [];
//         //     $id = $id;
//         //     $idrealvaue= $id;
//         //     foreach ($psdata as $key => $value) {
//         //         $response = Http::get("http://111.19.141.81:8089/a/api/devhistory", [
//         //             'appkey' => 'a46fa5b580fb44dba690c545e7a24371',
//         //             'secret' => 'E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH',
//         //             'deviceid' => $id,
//         //             'start' => $dateStart,
//         //             'end' => $dateEnd,
//         //             'size' => 200,
//         //             'no' => 1,
//         //         ]);

//         //         // Decode JSON response
//         //         $data = $response->json()['data'] ?? [];

//         //         // Prepare the response for DataTables
//         //         $formattedData = [];
                
//         //         $id = $value;
//         //         $deviceNames = [
//         //             '233614970' => 'Pressure Sensor 1 (Bar)',
//         //             '233614971' => 'Pressure Sensor 2 (Bar)',
//         //             '233614969' => 'Pressure Sensor 3 (Bar)',
//         //             '233614968' => 'Pressure Sensor 4 (Bar)'
//         //         ];
//         //         foreach ($data as $item) {
//         //             // return $item;
//         //             if($id == $value){
//         //                 $devicename = isset($deviceNames[$idrealvaue]) ? $deviceNames[$idrealvaue] : '';
//         //                 $result[] = [
//         //                     'deviceid' => $idrealvaue,
//         //                     "devicename" => $devicename,
//         //                     'numericalvalue' => $item['value'],
//         //                     'datetime' => $item['time'],
//         //                     // Add other fields here based on your API response
//         //                 ];
//         //             }
//         //             else{
//         //                 $result[] = [
//         //                     // 'deviceid' => "",
//         //                     // 'numericalvalue' => "",
//         //                     // 'datetime' => "",
//         //                     // Add other fields here based on your API response
//         //                 ];
//         //             }
                

//         //         }
//         //         $filteredResult = array_slice($result, $paginationStart, $paginationLength);

    
//         //         $response = [
//         //             "draw" => intval($request->input('draw')),
//         //             'recordsTotal' => count($result),
//         //             'recordsFiltered' => count($result),
//         //             'data' => $filteredResult,
//         //         ];
    
                
    
//         //         // Return the response
//         //         return response()->json($response);
                
                
//         //     }
        

//         //     // Slice data according to pagination parameters for pagination

//         // } catch (\Exception $e) {
//         //     return response()->json(['error' => $e->getMessage()], 500);
//         // }

        
//         try {
//             // Retrieve pagination parameters from the request
//             $paginationStart = intval($request->input('start'));
//             $paginationLength = intval($request->input('length'));
            
//             // Retrieve date range parameters from the request
//             $dateStart = $request->input('date_start') ?? Carbon::now()->startOfMonth()->toDateTimeString();
//             $dateEnd = $request->input('date_end') ?? Carbon::now()->endOfMonth()->toDateTimeString();
            
//             // Fetch historical data for the specified device ID
//             $response = Http::get("http://111.19.141.81:8089/a/api/devhistory", [
//                 'appkey' => 'a46fa5b580fb44dba690c545e7a24371',
//                 'secret' => 'E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH',
//                 'deviceid' => $id,
//                 'start' => $dateStart,
//                 'end' => $dateEnd,
//                 'size' => 300, // Adjust the size as needed
//                 'no' => 1,
//             ]);
    
//             // Decode JSON response
//             $data = $response->json()['data'] ?? [];
            
//             // Prepare the response for DataTables
//             $result = [];
//             $deviceNames = [
//                 '233614970' => 'Pressure Sensor 1 (Bar)',
//                 '233614971' => 'Pressure Sensor 2 (Bar)',
//                 '233614969' => 'Pressure Sensor 3 (Bar)',
//                 '233614968' => 'Pressure Sensor 4 (Bar)'
//             ];
//             foreach ($data as $item) {
//                 $result[] = [
//                     'deviceid' => $id,
//                     "devicename" => $deviceNames[$id] ?? 'Unknown', // Use the device name directly from the predefined array
//                     'numericalvalue' => $item['value'],
//                     'datetime' => $item['time'],
//                     // Add other fields here based on your API response
//                 ];
//             }
    
//             // Slice data according to pagination parameters for pagination
//             $filteredResult = array_slice($result, $paginationStart, $paginationLength);
    
//             // Return the response
//             return response()->json([
//                 "draw" => intval($request->input('draw')),
//                 'recordsTotal' => count($result),
//                 'recordsFiltered' => count($result),
//                 'data' => $filteredResult,
//             ]);
//         } catch (\Exception $e) {
//             return response()->json(['error' => $e->getMessage()], 500);
//         }


        
        
//     }
    

}
