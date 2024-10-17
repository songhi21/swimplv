<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;

class gwmwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gwmw');
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
        // return view('admin.ps.show')->with('id',$id);
        return view("admin.gwmw.show")->with('id',$id);
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


    // Helper function for error response

    public function getalldevice(Request $request)
    {
                // Define static values
        define('DEVICE_ID', '254718');
        define('DEVICE_NO', 'this is not the actual http request address or value');

        /**
         * Function to obtain access token.
         *
         * @return array|false Access token data or false on failure
         */
        function getAccessToken() {
            // Encode clientId and secret in Base64 format
            $clientId = 'this is not the actual http request address or value';
            $clientSecret = 'this is not the actual http request address or value';
            $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

            // Define the API endpoint to obtain access token
            $url = 'this is not the actual http request address or value';

            // Define the request headers
            $headers = [
                'Content-Type' => 'text/plain',
                'Authorization' => 'Basic ' . $base64ClientIdSecret,
            ];

            // Define the request body for password grant type
            $body = [
                'grant_type' => 'password',
                'username' => 'this is not the actual http request address or value',
                'password' => 'this is not the actual http request address or value',
            ];

            // Make the request to obtain access token
            $response = Http::withHeaders($headers)->get($url, $body);

            // Return access token data or false on failure
            return $response->successful() ? $response->json() : false;
        }

        /**
         * Function to fetch sensor data.
         *
         * @param array $accessToken Access token data
         * @param int $currPage Current page number
         * @param int $pageSize Page size
         * @return array|false Sensor data or false on failure
         */
        function fetchSensorData($accessToken, $currPage, $pageSize) {
            if (!$accessToken) {
                return false;
            }

            // Construct the headers and body for the sensor data request
            $sensorDataHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $accessToken['token_type'] . ' ' . $accessToken['access_token'],
                'tlinkAppId' => $accessToken['clientId'],
            ];

            $sensorDataBody = [
                'userId' => $accessToken['userId'],
                'deviceId' => DEVICE_ID,
                'deviceNo' => DEVICE_NO,
                'currPage' => $currPage,
                'pageSize' => $pageSize,
            ];

            // Make the API request to fetch sensor data using the access token
            $sensorDataResponse = Http::withHeaders($sensorDataHeaders)->post('this is not the actual http request address or value', $sensorDataBody);

            // Return sensor data or false on failure
            return $sensorDataResponse->successful() ? $sensorDataResponse->json() : false;
        }

        // Get current page and page size from the request
        $currPage = $request->input('currPage', 1);
        $pageSize = $request->input('pageSize', 10);

        // Obtain access token
        $accessToken = getAccessToken();

        // Check if access token retrieval failed
        if (!$accessToken) {
            return $this->errorResponse('Failed to obtain access token.');
        }

        // Fetch sensor data
        $sensorData = fetchSensorData($accessToken, $currPage, $pageSize);

        // Check if sensor data retrieval failed
        if (!$sensorData) {
            return $this->errorResponse('Failed to fetch sensor data.');
        }

        // Parse sensor data and return the response
        $sensorList = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'sensorName' => $item['sensorName'],
                'unit' => $item['unit'],
                'updateDate' =>  date('F d, Y, h:ia', strtotime($item['updateDate'])),
                'value' => $item['value'],
            ];
        }, $sensorData['device']['sensorsList']);

        // Return the response
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => count($sensorList), // Total records without filtering
            "recordsFiltered" => count($sensorList), // Total records with filtering (assuming no filtering is done here)
            "data" => $sensorList
        ]);
    }
     protected function errorResponse($message, $statusCode = 500)
    {
        return response()->json(['error' => $message], $statusCode);
    }

    public function getalldevicecounttotal(Request $request)
    {
        // Define static values
        define('DEVICE_IDs', '254718');
        define('DEVICE_NOs', 'M8091G4NJ67LK54N');
        define('CURR_PAGEs', '1');
        define('PAGE_SIZEs', '10');

        // Encode clientId and secret in Base64 format
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
        $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

        // Define the API endpoint to obtain access token
        $url = 'this is not the actual http request address or value';

        // Define the request headers
        $headers = [
            'Content-Type' => 'text/plain',
            'Authorization' => 'Basic ' . $base64ClientIdSecret,
        ];

        // Define the request body for password grant type
        $body = [
            'grant_type' => 'password',
            'username' => 'this is not the actual http request address or value',
            'password' => 'this is not the actual http request address or value',
        ];

        // Make the request to obtain access token
        $response = Http::withHeaders($headers)->get($url, $body);

        // Check if the request was successful
        if (!$response->successful()) {
            return $this->errorResponse('Failed to obtain access token.', $response->status());
        }

        // Extract the access token
        $data = $response->json();
        $accessToken = $data['access_token'];

        // Construct the headers and body for the sensor data request
        $sensorDataHeaders = [
            'Content-Type' => 'application/json',
            'Authorization' => $data['token_type'] . ' ' . $accessToken,
            'tlinkAppId' => $data['clientId'],
        ];

        $sensorDataBody = [
            'userId' => $data['userId'],
            'deviceId' => DEVICE_IDs,
            'deviceNo' => DEVICE_NOs,
            'currPage' => CURR_PAGEs,
            'pageSize' => PAGE_SIZEs,
        ];

        // Make the API request to fetch sensor data using the access token
        $sensorDataResponse = Http::withHeaders($sensorDataHeaders)->post('this is not the actual http request address or value', $sensorDataBody);
        // Check if the sensor data request was successful
        if (!$sensorDataResponse->successful()) {
            return $this->errorResponse('Failed to fetch single device data.', $sensorDataResponse->status());
        }
        $countrowstotaldevices = $sensorDataResponse['rowCount'];
        $total = ['totaldevices' => $countrowstotaldevices];
        return response()->json($total);
    }
    public function gethistoricalvaluedevices(Request $request, $id)
    {
        try {
            // Encode clientId and secret in Base64 format
            $clientId = '757c27c0bac14d3992a553daadc0b918';
            $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
            $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

            // Define the API endpoint to obtain access token
            $url = 'this is not the actual http request address or value';

            // Define the request headers
            $headers = [
                'Content-Type' => 'text/plain',
                'Authorization' => 'Basic ' . $base64ClientIdSecret,
            ];

            // Define the request body for password grant type
            $body = [
                'grant_type' => 'password',
                'username' => 'this is not the actual http request address or value',
                'password' => 'this is not the actual http request address or value',
            ];

            // Make the request to obtain access token
            $response = Http::withHeaders($headers)->get($url, $body);

            // Check if the request was successful
            if ($response->successful()) {
                // Parse the JSON response
                $data = $response->json();

                // Extract the access token
                $accessToken = $data['access_token'];
                $tokenType = $data['token_type'];

                // Define the API endpoint to get sensor history
                $historyUrl = 'this is not the actual http request address or value';

                // Define the request headers for historical data
                $historyHeaders = [
                    'Content-Type' => 'application/json',
                    'Authorization' => $tokenType." " . $accessToken,
                    'tlinkAppId' => $data['clientId'],
                ];
                $dateStart = $request->input('date_start') ?? Carbon::now()->startOfMonth()->toDateTimeString();
                $dateEnd = $request->input('date_end') ?? Carbon::now()->endOfMonth()->toDateTimeString();
                // Define the request body for sensor history
                $historyBody = [
                    'userId' => $data['userId'], // Use userId from the response
                    'sensorId' => $id, 
                    'startDate' => $dateStart,
                    'endDate' => $dateEnd ,
                    'pagingState' => '', // Assuming this is the starting page
                    'pageSize' => 300,
                ];

                // Make the request to fetch sensor history
                $historyResponse = Http::withHeaders($historyHeaders)->post($historyUrl, $historyBody);
        
                // Check if the historical data request was successful
                if ($historyResponse->successful()) {
                    // Parse the JSON response
                    $sensorHistory = $historyResponse->json();
                    
                    // Process the data and format it for DataTables
                    $sensorId = $sensorHistory['sensorId'];
                    $sensorName = $sensorHistory['sensorName'];
                    $filteredResult = [];
                    // return $sensorId;
                    foreach ($sensorHistory['dataList'] as $item) {
                        $filteredResult[] = [
                            'deviceid' => $sensorId,
                            'devicename' => $sensorName,
                            'addTime' => $item['addTime'],
                            'val' => $item['val'],
                            // Add more fields as needed
                        ];
                    }

                    // Retrieve pagination parameters from the request
                    $paginationStart = intval($request->input('start'));
                    $paginationLength = intval($request->input('length'));

                    // Slice data according to pagination parameters for pagination
                    $filteredResult = array_slice($filteredResult, $paginationStart, $paginationLength);

                    // Return the formatted data
                    return response()->json([
                        "draw" => intval($request->input('draw')),
                        'recordsTotal' => count($sensorHistory['dataList']),
                        'recordsFiltered' => count($sensorHistory['dataList']),
                        'data' => $filteredResult,
                    ]);
                } else {
                    // Return an error response for historical data request
                    return response()->json([
                        'error' => 'Failed to fetch sensor history.',
                    ], $historyResponse->status());
                }
            } else {
                // Return an error response for access token request
                return response()->json([
                    'error' => 'Failed to obtain access token.',
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    


    public function getsinglevaluehistorydevices(Request $request, $id)
    {
        // Define static values
        define('DEVICE_ID2', 'this is not the actual http request address or value');
        define('DEVICE_NO2', 'this is not the actual http request address or value');
    
        // Get current page and page size from the request
        $currPage = $request->input('currPage', 1);
        $pageSize = $request->input('pageSize', 10);
    
        // Obtain access token or retrieve from cache if available
        $accessToken = Cache::remember('access_token', now()->addMinutes(30), function () {
            return $this->getAccessToken();
        });
    
        // Check if access token retrieval failed
        if (!$accessToken) {
            return $this->errorResponse('Failed to obtain access token.');
        }
    
        // Fetch sensor data
        $sensorData = $this->fetchSensorData($accessToken, $currPage, $pageSize);
    
        // Check if sensor data retrieval failed
        if (!$sensorData) {
            return $this->errorResponse('Failed to fetch sensor data.');
        }
    
        // Parse sensor data and filter out null values
        $sensorList = array_filter(array_map(function ($item) use ($id) {
            if ($id == $item['id']) {
                return [
                    'id' => $item['id'],
                    'sensorName' => $item['sensorName'],
                    'unit' => $item['unit'],
                    'updateDate' => date('F d, Y, h:ia', strtotime($item['updateDate'])),
                    'value' => $item['value'],
                ];
            }
        }, $sensorData['device']['sensorsList']));
    
        // Return the response
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => count($sensorList), // Total records without filtering
            "recordsFiltered" => count($sensorList), // Total records with filtering (assuming no filtering is done here)
            "data" => array_values($sensorList) // Reset array keys
        ]);
    }

/**
 * Function to obtain access token.
 *
 * @return array|false Access token data or false on failure
 */
private function getAccessToken()
{
    // Encode clientId and secret in Base64 format
    $clientId = 'this is not the actual http request address or value';
    $clientSecret = 'this is not the actual http request address or value';
    $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

    // Define the API endpoint to obtain access token
    $url = 'this is not the actual http request address or value';

    // Define the request headers
    $headers = [
        'Content-Type' => 'text/plain',
        'Authorization' => 'Basic ' . $base64ClientIdSecret,
    ];

    // Define the request body for password grant type
    $body = [
        'grant_type' => 'password',
        'username' => 'this is not the actual http request address or value',
        'password' => 'this is not the actual http request address or value',
    ];

    // Make the request to obtain access token
    $response = Http::withHeaders($headers)->get($url, $body);

    // Return access token data or false on failure
    return $response->successful() ? $response->json() : false;
}

/**
 * Function to fetch sensor data.
 *
 * @param array $accessToken Access token data
 * @param int $currPage Current page number
 * @param int $pageSize Page size
 * @return array|false Sensor data or false on failure
 */
private function fetchSensorData($accessToken, $currPage, $pageSize)
{
    if (!$accessToken) {
        return false;
    }

    // Construct the headers and body for the sensor data request
    $sensorDataHeaders = [
        'Content-Type' => 'application/json',
        'Authorization' => $accessToken['token_type'] . ' ' . $accessToken['access_token'],
        'tlinkAppId' => $accessToken['clientId'],
    ];

    $sensorDataBody = [
        'userId' => $accessToken['userId'],
        'deviceId' => DEVICE_ID2,
        'deviceNo' => DEVICE_NO2,
        'currPage' => $currPage,
        'pageSize' => $pageSize,
    ];

    // Make the API request to fetch sensor data using the access token
    $sensorDataResponse = Http::withHeaders($sensorDataHeaders)->post('this is not the actual http request address or value', $sensorDataBody);
    
    // Return sensor data or false on failure
    return $sensorDataResponse->successful() ? $sensorDataResponse->json() : false;
}
}
