<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
class smartwatermeterControlleradmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sw');
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
        //
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
    public function getsmarmetterlist(Request $request)
    {
        try {
            // Retrieve parameters sent by DataTables
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search.value'); // Get the search term

            // Make HTTP request to fetch smart meter data
            $client = new Client();
            $response = $client->post('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
                'json' => [
                    'MeterIdList' => ['62992212211173', '62992212211174', '62992212211175', '62992212211172'],
                    'UserName' => 'EBC',
                    'PassWord' => '123456'
                ]
            ]);
            $output = json_decode($response->getBody()->getContents(), true);
            $swmData = $output['MeterDataList'] ?? [];

            // Process data for DataTables
            $result = collect($swmData)->map(function ($value) {
                return [
                    "devicename" => $this->getSmartMeterName($value['MeterId']),
                    "id" => $value['MeterId'],
                    "PositiveCumulativeFlow" => $value['PositiveCumulativeFlow'],
                    "PositiveInstantaneousFlow" => $value['PositiveInstantaneousFlow'],
                    "AntiCumulativeFlow" => $value['AntiCumulativeFlow'],
                    "AntiInstantaneousFlow" => $value['AntiInstantaneousFlow'],
                    "CommunicationTime" => $value['CommunicationTime'],
                    "ValveStatus" => $value['ValveStatus'],
                    "MeterVoltage" => $value['MeterVoltage'],
                    "SignalIntensity" => $value['SignalIntensity'],
                    "PipelinePressure" => $value['PipelinePressure']
                ];
            });

            // Apply pagination after filtering
            $filteredResult = $result->slice($start, $length)->values();

            // Return the filtered result to DataTables.js
            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => $result->count(), // Total records without filtering
                "recordsFiltered" => $result->count(), // Total records with filtering (assuming no filtering is done here)
                "data" => $filteredResult
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getSmartMeterName($meterId)
    {
        $meterNames = [
            '62992212211174' => 'Smart Meter 1 (m³)',
            '62992212211172' => 'Smart Meter 2 (m³)',
            '62992212211173' => 'Smart Meter 3 (m³)',
            '62992212211175' => 'Smart Meter 4 (m³)'
        ];

        return $meterNames[$meterId] ?? '';
    }
    // public function getsmarmetterlist(Request $request)
    // {
    //     // Fetch your data from the server or database




    //     // $dataswm3 = ['PositiveCumulativeFlow'=> $swm3[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm3[0]['CommunicationTime'])),'error'=> 'success'];



    //     try {
    //         // Retrieve parameters sent by DataTables
    //         $start = $request->input('start');
    //         $length = $request->input('length');
    //         $searchValue = $request->input('search.value'); // Get the search term


    //         $client3 = new Client();

    //         $responseas3 =  $client3->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
    //                         "body" => "{'MeterIdList':['62992212211173','62992212211174','62992212211175','62992212211172'],'UserName':'EBC','PassWord':'123456'}"
    //                     ]);
    //         $output3 =  json_decode($responseas3->getBody()->getContents(), true);
    //         $swm3 = $output3['MeterDataList'];

    //         // Process data for DataTables
    //         $result = [];
    //         foreach ($swm3 as $key => $value) {
    //             // return $value;
    //             $result[] = [
    //                 "devicename" => ($value['MeterId'] == '62992212211174') ? "Smart Meter 1 (m³)" :
    //                                 (($value['MeterId'] == '62992212211172') ? "Smart Meter 2 (m³)" :
    //                                 (($value['MeterId'] == '62992212211173') ? "Smart Meter 3 (m³)" :
    //                                 (($value['MeterId'] == '62992212211175') ? "Smart Meter 4 (m³)" : ""))),
    //                 "id" => $value['MeterId'],
    //                 "PositiveCumulativeFlow" => $value['PositiveCumulativeFlow'],
    //                 "PositiveInstantaneousFlow" => $value['PositiveInstantaneousFlow'],
    //                 "AntiCumulativeFlow" => $value['AntiCumulativeFlow'],
    //                 "AntiInstantaneousFlow" => $value['AntiInstantaneousFlow'],
    //                 "CommunicationTime" => $value['CommunicationTime'],
    //                 "ValveStatus" => $value['ValveStatus'],
    //                 "MeterVoltage" => $value['MeterVoltage'],
    //                 "SignalIntensity" => $value['SignalIntensity'],
    //                 "PipelinePressure" => $value['PipelinePressure']
    //             ];
                
                
                    
            
    //         }

    //         // Apply pagination after filtering
    //         $filteredResult = array_slice($result, $start, $length);

    //         // Return the filtered result to DataTables.js
            
    //         return response()->json([
    //             "draw" => intval($request->input('draw')),
    //             "recordsTotal" => count($result), // Total records without filtering
    //             "recordsFiltered" => count($result), // Total records with filtering (assuming no filtering is done here)
    //             "data" => $filteredResult
    //         ]);
                
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
    // public function getdatahistoricalist(Request $request)
    // {
    //     // not working yet-----------------
    //     $username = 'EBC';
    //     $password = '123456';

    //     try {
    //         $response = Http::withBasicAuth($username, $password)
    //                         ->get('https://www.tykjiot.com:8866/PltManager/Handler/Sys_NavigationsHandler.ashx');

    //         // Check if the request was successful
    //         if ($response->successful()) {
    //             // Retrieve the response body
    //             $data = $response->json();

    //             // Process the retrieved data as needed
    //             return response()->json($data);
    //         } else {
    //             // Log error response
    //             Log::error('Error response: ' . $response->body());

    //             // Handle the error response
    //             return response()->json(['error' => 'Failed to fetch data'], $response->status());
    //         }
    //     } catch (\Exception $e) {
    //         // Log exception
    //         Log::error('Exception occurred: ' . $e->getMessage());

    //         // Return error response
    //         return response()->json(['error' => 'An error occurred while processing the request'], 500);
    //     }
    // }

}
