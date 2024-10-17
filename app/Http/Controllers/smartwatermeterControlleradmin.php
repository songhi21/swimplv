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
            $response = $client->post('this is not the actual http request address or value', [
                'json' => [
                    'MeterIdList' => [this is not the actual http request address or value],
                    'UserName' => 'this is not the actual http request address or value',
                    'PassWord' => 'this is not the actual http request address or value'
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
            'this is not the actual http request address or value' => 'Smart Meter 1 (m³)',
            'this is not the actual http request address or value' => 'Smart Meter 2 (m³)',
            'this this is not the actual http request address or value not the actual http request address or value' => 'Smart Meter 3 (m³)',
            '62992212211175' => 'Smart Meter 4 (m³)'
        ];

        return $meterNames[$meterId] ?? '';
    }
    

}
