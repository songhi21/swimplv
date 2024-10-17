<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;

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
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search.value'); // Get the search term
    
            // Fetch your data from the server or database
            $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');
    
            $psjson = json_decode($psdevicelist->body(), true);
            $psdata = $psjson['data'] ?? [];
    
            // Process data for DataTables
            $result = [];
            foreach ($psdata as $key => $value) {
                $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$value");
                $resultvalue = json_decode($deviceinfo->body(), true); // Access the body of the HTTP response
    
                // Filter data based on search value
                if (isset($resultvalue['data']) && is_array($resultvalue['data'])) {
                    // Convert array data to string for searching
                    $stringValue = implode(' ', $resultvalue['data']);
                    if (stripos($stringValue, $searchValue) !== false) {
                        $pressname = ["Devicetype" => "Pressure sensor"];
                        $deviceData = array_merge($resultvalue['data'], $pressname);
                        $result[] = $deviceData;
                    }
                }
            }
    
            // Extract data for the current page based on pagination parameters
            $pagedData = array_slice($result, $start, $length);
    
            // Count total records after filtering
            $totalFiltered = count($result);
    
            // Prepare the response for DataTables
            $response = [
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $totalFiltered, // Update to totalFiltered
                'recordsFiltered' => $totalFiltered,
                'data' => $pagedData,
            ];
    
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

            // try {
            //     // Retrieve parameters sent by DataTables for pagination
            //     $start = $request->input('start');
            //     $length = $request->input('length');

            //     // Fetch your data from the server or database
            //     $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');
                
            //     $psjson = json_decode($psdevicelist->body(), true); // Ensure you're calling ->body() if using Laravel's Http facade
            //     $psdata = $psjson['data'] ?? []; // Fallback to empty array if data is not set

            //     // Process data for DataTables
            //     $result = [];
            //     foreach ($psdata as $key => $value) {
            //         $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$value");
                
            //         $resultvalue = json_decode($deviceinfo, true);
                
            //         // Ensure $resultvalue['data'] is an array before attempting to merge
            //         if (is_array($resultvalue['data'])) {
            //             $pressname = ["Devicetype" => "Pressure sensor"];
            //             // Correctly merge arrays
            //             $deviceData = array_merge($resultvalue['data'], $pressname);
            //             $result[] = $deviceData; // Add merged array to the result
            //         } else {
            //             // Handle the case where $resultvalue['data'] is not an array
            //             // For example, log an error or skip this record
            //         }
            //     }
                
            //     // Extract data for the current page based on pagination parameters
            //     $pagedData = array_slice($result, $start, $length);

            //     // Count total records (needed for pagination)
            //     $totalRecords = count($result);

            //     // Prepare the response for DataTables
            //     $response = [
            //         'draw' => intval($request->input('draw')), // Cast draw parameter back to integer
            //         'recordsTotal' => $totalRecords, // Total records count
            //         'recordsFiltered' => $totalRecords, // Total records count for filtering (same as total records if no additional filtering applied)
            //         'data' => $pagedData, // Data for the current page
            //     ];

            //     return response()->json($response);
            // } catch (\Exception $e) {
            //     // Handle any errors and return an error response
            //     return response()->json(['error' => $e->getMessage()], 500);
            //     // return "error";
            // }




        // try {
        //     // Fetch your data from the server or database

        //     $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');
            
        //     $psjson = json_decode($psdevicelist, true);
        //     $psdata = $psjson['data'];
            
        //     $result = [];
        //     foreach($psdata as $key => $value){
        //         // $result[$value] = $value;
        //         $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$value");
        //         $resultvalue = json_decode($deviceinfo, true);
        //         $pressname = ["Devicetype" => "Pressure sensor"];
        //         $result[$value] = $resultvalue['data']  + $pressname;
        //     }
        //     // $validationps1233614970 = $ps1233614970['msg'];
        //     // $ps1233614970 = json_decode($ps1233614970, true);
        //     // $dataps1 = ['currentValue'=> $ps1233614970['data']['currentValue'],'status'=> $ps1233614970['data']['status'], 'preUnits'=> $ps1233614970['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps1233614970['data']['receiveTime']))];

        
        //     return response()->json($result);
        // } catch (\Exception $e) {
        //     // Handle any errors and return an error response
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }
    public function getDatadevicehistoricaldata(Request $request)
    {

            try {
                // Retrieve parameters sent by DataTables for pagination
                $start = $request->input('start');
                $length = $request->input('length');

                // Fetch your data from the server or database
                $psdevicelist = Http::get('http://111.19.141.81:8089/a/api/appdevice?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH');
                
                $psjson = json_decode($psdevicelist->body(), true); // Ensure you're calling ->body() if using Laravel's Http facade
                $psdata = $psjson['data'] ?? []; // Fallback to empty array if data is not set

                // Process data for DataTables
                $result = [];
                foreach ($psdata as $key => $value) {
                    $deviceinfo = Http::get("http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=$value");
                
                    $resultvalue = json_decode($deviceinfo, true);
                
                    // Ensure $resultvalue['data'] is an array before attempting to merge
                    if (is_array($resultvalue['data'])) {
                        $pressname = ["Devicetype" => "Pressure sensor"];
                        // Correctly merge arrays
                        $deviceData = array_merge($resultvalue['data'], $pressname);
                        $result[] = $deviceData; // Add merged array to the result
                    } else {
                        // Handle the case where $resultvalue['data'] is not an array
                        // For example, log an error or skip this record
                    }
                }
                
                // Extract data for the current page based on pagination parameters
                $pagedData = array_slice($result, $start, $length);

                // Count total records (needed for pagination)
                $totalRecords = count($result);

                // Prepare the response for DataTables
                $response = [
                    'draw' => intval($request->input('draw')), // Cast draw parameter back to integer
                    'recordsTotal' => $totalRecords, // Total records count
                    'recordsFiltered' => $totalRecords, // Total records count for filtering (same as total records if no additional filtering applied)
                    'data' => $pagedData, // Data for the current page
                ];

                return response()->json($response);
            } catch (\Exception $e) {
                // Handle any errors and return an error response
                return response()->json(['error' => $e->getMessage()], 500);
                // return "error";
            }

    }
    

}
