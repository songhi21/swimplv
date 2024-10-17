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
        $response = Http::get('this is not the actual http request address or value', [
            'appkey' => 'this is not the actual http request address or value',
            'secret' => 'this is not the actual http request address or value',
        ]);

        return $response->json()['data'] ?? [];
    }

    private function fetchDeviceDataConcurrently(array $deviceIds): array
    {
        $mh = curl_multi_init();
        $curlHandles = [];

        foreach ($deviceIds as $deviceId) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "this is not the actual http request address or value");
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
            $response = Http::get("this is not the actual http request address or value", [
                'appkey' => 'this is not the actual http request address or value',
                'secret' => 'this is not the actual http request address or value',
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


}
