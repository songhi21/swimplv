<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;

class mapsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        


        //- return value to maps page-------------------------------------
        return view('maps');

        


         //-----------------------------------------------------------------------------endmaps page


        



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
    //pressure Sensor-------------------------------------properties
    public function getDataps1()
    {



        // Fetch your data from the server or database

        $ps1233614970 = Http::get('this is not the actual http request address');
        

        // $validationps1233614970 = $ps1233614970['msg'];
        $ps1233614970 = json_decode($ps1233614970, true);
        $dataps1 = ['deviceid'=> $ps1233614970['data']['id'],'currentValue'=> $ps1233614970['data']['currentValue'],'status'=> $ps1233614970['data']['status'], 'preUnits'=> $ps1233614970['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps1233614970['data']['receiveTime']))];

       
        return response()->json($dataps1);
    }
    public function getDataps2()
    {
        // Fetch your data from the server or database

        $ps2233614971 = Http::get('this is not the actual http request address');
        

        $ps2233614971 = json_decode($ps2233614971, true);
        $dataps2 = ['deviceid'=> $ps2233614971['data']['id'],'currentValue'=> $ps2233614971['data']['currentValue'],'status'=> $ps2233614971['data']['status'], 'preUnits'=> $ps2233614971['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps2233614971['data']['receiveTime']))];

       
        return response()->json($dataps2);
    }
    public function getDataps3()
    {
        // Fetch your data from the server or database

        $ps3233614969 = Http::get('this is not the actual http request address');        

        $ps3233614969 = json_decode($ps3233614969, true);
        $dataps3 = ['deviceid'=> $ps3233614969['data']['id'],'currentValue'=> $ps3233614969['data']['currentValue'],'status'=> $ps3233614969['data']['status'], 'preUnits'=> $ps3233614969['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps3233614969['data']['receiveTime']))];

       
        return response()->json($dataps3);
    }

    public function getDataps4()
    {
        // Fetch your data from the server or database

        $articlesps4 = Http::get('this is not the actual http request address');

        $ps4233614968 = json_decode($articlesps4, true);
        $dataps4 = ['deviceid'=> $ps4233614968['data']['id'],'currentValue'=> $ps4233614968['data']['currentValue'],'status'=> $ps4233614968['data']['status'], 'preUnits'=> $ps4233614968['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps4233614968['data']['receiveTime']))];

       
        return response()->json($dataps4);
    }









    //end------------------------------------------------------------
    // Smartmeter-----------------------------------------properties
    public function getDataSmartmetter()
    {
        // Fetch your data from the server or database
        $client = new Client();

        $responseas =  $client->get('this is not the actual http request address', [
                        "body" => "{'this is not the actual http request address'}"
                    ]);
        $output =  json_decode($responseas->getBody()->getContents(), true);
        $swm = $output['MeterDataList'];


        $dataswm = ['deviceid'=> $swm[0]['MeterId'],'PositiveCumulativeFlow'=> $swm[0]['PositiveCumulativeFlow'],'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($swm[0]['CommunicationTime'])),'error'=> 'success'];
       
        return response()->json($dataswm);
    }
    public function getDataSmartmetter2()
    {
        // Fetch your data from the server or database
        $client2 = new Client();
        
        $responseas2 =  $client2->get('this is not the actual http request address', [
                        "body" => "{'this is not the actual http request address'}"
                    ]);
        $output2 =  json_decode($responseas2->getBody()->getContents(), true);
        $swm2 = $output2['MeterDataList'];
        

        
        $dataswm2 = ['deviceid'=> $swm2[0]['MeterId'],'PositiveCumulativeFlow'=> $swm2[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm2[0]['CommunicationTime'])),'error'=> 'success'];

        return response()->json($dataswm2);
    }
    public function getDataSmartmetter3()
    {
        // Fetch your data from the server or database

        $client3 = new Client();

        $responseas3 =  $client3->get('this is not the actual http request address', [
                        "body" => "{'this is not the actual http request address'}"
                    ]);
        $output3 =  json_decode($responseas3->getBody()->getContents(), true);
        $swm3 = $output3['MeterDataList'];



        $dataswm3 = ['deviceid'=> $swm3[0]['MeterId'],'PositiveCumulativeFlow'=> $swm3[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm3[0]['CommunicationTime'])),'error'=> 'success'];

        return response()->json($dataswm3);
    }
    public function getDataSmartmetter4()
    {
        // Fetch your data from the server or database

        $client4 = new Client();
    
        $responseas4 =  $client4->get('this is not the actual http request address', [
                        "body" => "{'this is not the actual http request address'}"
                    ]);
        $output4 =  json_decode($responseas4->getBody()->getContents(), true);
        $swm4 = $output4['MeterDataList'];
    
    
        $dataswm4 = ['deviceid'=> $swm4[0]['MeterId'],'PositiveCumulativeFlow'=> $swm4[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm4[0]['CommunicationTime'])),'error'=> 'success'];

        return response()->json($dataswm4);
    }
    
    public function getSingleDeviceDatawell(Request $request)
    {
        // Define static values
        define('DEVICE_ID', '254718');
        define('DEVICE_NO', 'M8091G4NJ67LK54N');
        define('CURR_PAGE', '1');
        define('PAGE_SIZE', '10');

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
            'deviceId' => DEVICE_ID,
            'deviceNo' => DEVICE_NO,
            'currPage' => CURR_PAGE,
            'pageSize' => PAGE_SIZE,
        ];

        // Make the API request to fetch sensor data using the access token
        $sensorDataResponse = Http::withHeaders($sensorDataHeaders)->post('this is not the actual http request address', $sensorDataBody);

        // Check if the sensor data request was successful
        if (!$sensorDataResponse->successful()) {
            return $this->errorResponse('Failed to fetch single device data.', $sensorDataResponse->status());
        }

        // Parse the JSON response and return the sensor data response
        $sensorData = $sensorDataResponse->json();
        $sensorList = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'sensorName' => $item['sensorName'],
                'unit' => $item['unit'],
                'updateDate' =>  date('F d, Y, h:ia  ', strtotime($item['updateDate'])),
                'value' => $item['value']
            ];
        }, $sensorData['device']['sensorsList']);

        return response()->json($sensorList);
    }

    private function errorResponse($message, $status)
    {
        return response()->json(['error' => $message], $status);
    }
    // alldevices gwmw----------------------------------------
    // phdevices---------------------------------------------------------
    public function getphhistoricalvalue(Request $request)
    {
        // Encode clientId and secret in Base64 format
        $clientId = 'this is not the actual http request address or value';
        $clientSecret = 'this is no the actual value';
        $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

        // Define the API endpoint to obtain access token
        $url = 'this is not the actual http request address';

        // Define the request headers
        $headers = [
            'Content-Type' => 'text/plain',
            'Authorization' => 'Basic ' . $base64ClientIdSecret,
        ];

        // Define the request body for password grant type
        $body = [
            'grant_type' => 'password',
            'username' => 'this is not the actual http request address or valuet',
            'password' => 'this is not the actual http request address or value',
        ];

        // Make the request to obtain access token
        $response = Http::withHeaders($headers)->get($url, $body);
        $userid = $response['userId'];
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
        
            // Extract the access token
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            // Define the API endpoint to get sensor history
            $historyUrl = 'this is not the actual http request address';

            // Define the request headers for historical data
            $historyHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken,
                'tlinkAppId' => $data['clientId'],
            ];

            // Define the request body for sensor history
            $historyBody = [
                'userId' => $userid, // Replace with actual User Id
                'sensorId' => '3885865', // Replace with actual Sensor Id
                'startDate' => '2024-01-08 00:00:00',
                'endDate' => '2024-05-02 00:59:59',
                'pagingState' => '', // Assuming this is the starting page
                'pageSize' => 1000,
            ];

            // Make the request to fetch sensor history
            $historyResponse = Http::withHeaders($historyHeaders)->post($historyUrl, $historyBody);
            return $historyResponse ;
            // Check if the historical data request was successful
            if ($historyResponse->successful()) {
                // Parse the JSON response
                $sensorHistory = $historyResponse->json();
                return response()->json($sensorHistory);
            } else {
                // Return an error response for historical data request
                return response()->json([
                    'error' => 'Failed to fetch sensor history.'
                ], $historyResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }
    // phsingledevices----------------------------------------------------------------------------
    public function getphvalue(Request $request){
        $clientId = 'this is not the actual http request address or value';
        $clientSecret = 'this is not the actual http request address or value';
        $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

        // Define the API endpoint to obtain access token
        $url = 'this is not the actual http request address';

        // Define the request headers
        $headers = [
            'Content-Type' => 'text/plain',
            'Authorization' => 'Basic ' . $base64ClientIdSecret,
        ];

        // Define the request body for password grant type
        $body = [
            'grant_type' => 'this is not the actual http request address or value',
            'username' => 'this is not the actual http request address or value',
            'password' => 'this is not the actual http request address or value',
        ];

        // Make the request to obtain access token
        $response = Http::withHeaders($headers)->get($url, $body);
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 3885865, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $phvalueresult = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($phvalueresult);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }
    // phdevices---------------------------------------------------------end
    // Temperature of PH devices---------------------------------------------------------
    public function getTemperatureofPHhistoricalvalue(Request $request)
    {
        // Encode clientId and secret in Base64 format
        $clientId = 'this is not the actual http request address or value';
        $clientSecret = 'this is not the actual http request address';
        $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

        // Define the API endpoint to obtain access token
        $url = 'this is not the actual http request address';

        // Define the request headers
        $headers = [
            'Content-Type' => 'text/plain',
            'Authorization' => 'Basic ' . $base64ClientIdSecret,
        ];

        // Define the request body for password grant type
        $body = [
            'grant_type' => 'password',
            'username' => 'this is not the actual http request address',
            'password' => 'this is not the actual http request address',
        ];

        // Make the request to obtain access token
        $response = Http::withHeaders($headers)->get($url, $body);
        $userid = $response['userId'];
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
        
            // Extract the access token
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            // Define the API endpoint to get sensor history
            $historyUrl = 'this is not the actual http request address';

            // Define the request headers for historical data
            $historyHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken,
                'tlinkAppId' => $data['clientId'],
            ];

            // Define the request body for sensor history
            $historyBody = [
                'userId' => $userid, // Replace with actual User Id
                'sensorId' => '3885866', // Replace with actual Sensor Id
                'startDate' => '2024-01-08 00:00:00',
                'endDate' => '2024-05-02 00:59:59',
                'pagingState' => '', // Assuming this is the starting page
                'pageSize' => 1000,
            ];

            // Make the request to fetch sensor history
            $historyResponse = Http::withHeaders($historyHeaders)->post($historyUrl, $historyBody);
            return $historyResponse ;
            // Check if the historical data request was successful
            if ($historyResponse->successful()) {
                // Parse the JSON response
                $sensorHistory = $historyResponse->json();
                return response()->json($sensorHistory);
            } else {
                // Return an error response for historical data request
                return response()->json([
                    'error' => 'Failed to fetch sensor history.'
                ], $historyResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }
    

    





    public function getTemperatureofPHvalue(Request $request){
        $clientId = 'this is not the actual http request address or value';
        $clientSecret = 'this is not the actual http request address or value';
        $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

        // Define the API endpoint to obtain access token
        $url = 'this is not the actual http request address';

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
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address or value';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 3885866, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }

















    // Temperature of PH devices---------------------------------------------------------end
    // Conductivity-------------------------------

    public function getConductivityvalue(Request $request){
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
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address or value';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 3885867, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }



    // Conductivity-------------------------------end

    // TDS-----------------------------------start
    public function gettdsvalue(Request $request){
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
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address or value';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 3885868, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }
    // TDS-----------------------------------end
    
    // Salinity-----------------------------------start


    public function getsalinityvalue(Request $request){
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
            'grant_type' => 'this is not the actual http request address or value',
            'username' => 'this is not the actual http request address or value',
            'password' => 'this is not the actual http request address or value',
        ];

        // Make the request to obtain access token
        $response = Http::withHeaders($headers)->get($url, $body);
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address or value';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 'this is not the actual http request address or value', // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }










    // Salinity-----------------------------------end
    // Temperature of TDS-----------------------------------start

    public function getTemperatureofTDSvalue(Request $request){
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
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address or value';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 3885870, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }








    // Temperature of TDS-----------------------------------end
    public function getlecelsensorvalue(Request $request){
        $clientId = '';
        $clientSecret = '';
        $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

        // Define the API endpoint to obtain access token
        $url = 'https://app.dtuip.com/oauth/token';

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
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'https://app.dtuip.com/api/device/getSingleSensorDatas';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' => 3885870, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }
    // level sensor---------------------------------------------start

    public function getlevelsensorvalue(Request $request){
        $clientId = '';
        $clientSecret = '';
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
        // return $response;
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response
            $data = $response->json();
            
            // Extract necessary data
            $accessToken = $data['access_token'];
            $tokenType = $data['token_type'];
            $clientId = $data['clientId']; // Note: it's 'client_id' in the response
            
            // Define the API endpoint to fetch single sensor data
            $sensorUrl = 'this is not the actual http request address or value';

            // Define the request headers for sensor data
            $sensorHeaders = [
                'Content-Type' => 'application/json',
                'Authorization' => $tokenType." " . $accessToken, // Added space after tokenType
                'tlinkAppId' => $clientId,
            ];
        
            // Define the request body parameters for sensor data
            $sensorBody = [
                'userId' => $data['userId'], // Extracted from the response
                'sensorId' =>3885871, // Replace with the actual sensor ID
            ];
            // Make the GET request to fetch single sensor data
            $sensorResponse = Http::withHeaders($sensorHeaders)->post($sensorUrl, $sensorBody);

            // return $sensorResponse;
            // Check if the sensor data request was successful
            if ($sensorResponse->successful()) {
                // Parse the JSON response
                $sensorData = $sensorResponse->json();
                
                // Display the sensor data
                return response()->json($sensorData);
            } else {
                // Return an error response for sensor data request
                return response()->json([
                    'error' => 'Failed to fetch single sensor data.'
                ], $sensorResponse->status());
            }
        } else {
            // Return an error response for access token request
            return response()->json([
                'error' => 'Failed to obtain access token.'
            ], $response->status());
        }
    }










    // level sensor---------------------------------------------end
    
}
