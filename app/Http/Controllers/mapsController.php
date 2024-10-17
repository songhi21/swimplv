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
        

        // try {
        //     //ps1233614970---------------------------------------
        //     $ps1233614970 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614970');
        
        //     if($ps1233614970['msg'] == 'success'){
        //         $validationps1233614970 = $ps1233614970['msg'];
        //         $ps1233614970 = json_decode($ps1233614970, true);
               
        //     }
        //     else{
        //         $validationps1233614970 = 'error';
        //     }
        // }
        // catch(\Exception $e) {
        //     $validationps1233614970 = 'error';
        // }
        //ps1
        // if($validationps1233614970  == "success"){
        //     $dataps1 = $ps1233614970['data']+['error' => 'success'];

        // }
        // else{
        //     $dataps1 = ['error' => 'error'];


        // }



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

        $ps1233614970 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614970');
        

        // $validationps1233614970 = $ps1233614970['msg'];
        $ps1233614970 = json_decode($ps1233614970, true);
        $dataps1 = ['deviceid'=> $ps1233614970['data']['id'],'currentValue'=> $ps1233614970['data']['currentValue'],'status'=> $ps1233614970['data']['status'], 'preUnits'=> $ps1233614970['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps1233614970['data']['receiveTime']))];

       
        return response()->json($dataps1);
    }
    public function getDataps2()
    {
        // Fetch your data from the server or database

        $ps2233614971 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614971');
        

        $ps2233614971 = json_decode($ps2233614971, true);
        $dataps2 = ['deviceid'=> $ps2233614971['data']['id'],'currentValue'=> $ps2233614971['data']['currentValue'],'status'=> $ps2233614971['data']['status'], 'preUnits'=> $ps2233614971['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps2233614971['data']['receiveTime']))];

       
        return response()->json($dataps2);
    }
    public function getDataps3()
    {
        // Fetch your data from the server or database

        $ps3233614969 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614969');        

        $ps3233614969 = json_decode($ps3233614969, true);
        $dataps3 = ['deviceid'=> $ps3233614969['data']['id'],'currentValue'=> $ps3233614969['data']['currentValue'],'status'=> $ps3233614969['data']['status'], 'preUnits'=> $ps3233614969['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps3233614969['data']['receiveTime']))];

       
        return response()->json($dataps3);
    }

    public function getDataps4()
    {
        // Fetch your data from the server or database

        $articlesps4 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614968');

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

        $responseas =  $client->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
                        "body" => "{'MeterIdList':['62992212211174'],'UserName':'EBC','PassWord':'123456'}"
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
        
        $responseas2 =  $client2->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
                        "body" => "{'MeterIdList':['62992212211172'],'UserName':'EBC','PassWord':'123456'}"
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

        $responseas3 =  $client3->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
                        "body" => "{'MeterIdList':['62992212211173'],'UserName':'EBC','PassWord':'123456'}"
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
    
        $responseas4 =  $client4->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
                        "body" => "{'MeterIdList':['62992212211175'],'UserName':'EBC','PassWord':'123456'}"
                    ]);
        $output4 =  json_decode($responseas4->getBody()->getContents(), true);
        $swm4 = $output4['MeterDataList'];
    
    
        $dataswm4 = ['deviceid'=> $swm4[0]['MeterId'],'PositiveCumulativeFlow'=> $swm4[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm4[0]['CommunicationTime'])),'error'=> 'success'];

        return response()->json($dataswm4);
    }
    // public function getDataSmartmetter4search()
    // {
    //     // Fetch your data from the server or database

    //     $client4 = new Client();
    
    //     $responseas4 =  $client4->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
    //                     "body" => "{'MeterIdList':['62992212211175'],'UserName':'EBC','PassWord':'123456'}"
    //                 ]);
    //     $output4 =  json_decode($responseas4->getBody()->getContents(), true);
    //     $swm4 = $output4['MeterDataList'];
    
    
    //     $dataswm4 = ['PositiveCumulativeFlow'=> $swm4[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm4[0]['CommunicationTime'])),'error'=> 'success'];
    //     // 'MeterId'=> $swm4[0]['MeterId'],
    //     return view('maps',contains('dataswm4'));
    // }
    // public function cctv(){
    //     $MAC = exec('44:01:bb:a8:76:e4'); 
  
    //     // Storing 'getmac' value in $MAC 
    //     $MAC = strtok($MAC, ' '); 
        
    //     // Updating $MAC value using strtok function,  
    //     // strtok is used to split the string into tokens 
    //     // split character of strtok is defined as a space 
    //     // because getmac returns transport name after 
    //     // MAC address    
    //     echo "MAC address of Server is: $MAC"; 

    // }
    // public function getSingleDeviceDatawell(Request $request)
    // {
    //     // Encode clientId and secret in Base64 format
    //     $clientId = '757c27c0bac14d3992a553daadc0b918';
    //     $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
    //     $base64ClientIdSecret = base64_encode("$clientId:$clientSecret");

    //     // Define the API endpoint to obtain access token
    //     $url = 'https://app.dtuip.com/oauth/token';

    //     // Define the request headers
    //     $headers = [
    //         'Content-Type' => 'text/plain',
    //         'Authorization' => 'Basic ' . $base64ClientIdSecret,
    //     ];

    //     // Define the request body for password grant type
    //     $body = [
    //         'grant_type' => 'password',
    //         'username' => 'Smart Water Infrastructure Management',
    //         'password' => 'swim1234',
    //     ];

    //     // Make the request to obtain access token
    //     $response = Http::withHeaders($headers)->get($url, $body);
    
    //     // Check if the request was successful
    //     if ($response->successful()) {
    //         // Parse the JSON response
    //         $data = $response->json();
        
    //         // Extract the access token
    //         $accessToken = $data['access_token'];
    //         $clientid = $data['clientId'];
    //         $token_type = $data['token_type'];
    //         $refresh_token = $data['refresh_token'];
    //         $expires_in = $data['expires_in'];
    //         $scope = $data['scope'];
    //         $clientSecret = $data['clientSecret'];
    //         $userId = $data['userId'];

    //         // Use the access token to fetch sensor data
    //         // Construct the headers and body for the sensor data request
    //         $sensorDataHeaders = [
    //             'Content-Type' => 'application/json',
    //             'Authorization' => $token_type.' ' . $accessToken,
    //             'tlinkAppId' => $clientid,
    //         ];
        
    //         $sensorDataBody = [
    //             'userId' => $userId,
    //             'deviceId' => '254718',
    //             'deviceNo' => 'M8091G4NJ67LK54N',
    //             'currPage' => '1',
    //             'pageSize' => '10',
    //         ];

    //         // Make the API request to fetch sensor data using the access token
    //         $sensorDataResponse = Http::withHeaders($sensorDataHeaders)->post('https://app.dtuip.com/api/device/getSingleDeviceDatas', $sensorDataBody);

    //         // Check if the sensor data request was successful
    //         if ($sensorDataResponse->successful()) {
    //             // Parse the JSON response
    //             $sensorData = $sensorDataResponse->json();
    //             $gmw = $sensorData['device']['sensorsList'];
    //             // Return the sensor data response

    //             $resultgmw = [];

    //             // Loop through each object in the JSON array
    //             foreach ($gmw as $item) {
    //                 // Extract the deviceId and add it to the deviceIds array
    //                 $resultgmw[] = ['id' => $item['id'],'sensorName' => $item['sensorName'],'unit' => $item['unit'],'updateDate' => $item['updateDate'],'value' => $item['value']];
    //             }
    //             return response()->json($resultgmw);
    //         } else {
    //             // Return an error response for sensor data request
    //             return response()->json([
    //                 'error' => 'Failed to fetch single device data.'
    //             ], $sensorDataResponse->status());
    //         }
    //     } else {
    //         // Return an error response for access token request
    //         return response()->json([
    //             'error' => 'Failed to obtain access token.'
    //         ], $response->status());
    //     }
    // }
    // alldevices gwmw---------------------
    public function getSingleDeviceDatawell(Request $request)
    {
        // Define static values
        define('DEVICE_ID', '254718');
        define('DEVICE_NO', 'M8091G4NJ67LK54N');
        define('CURR_PAGE', '1');
        define('PAGE_SIZE', '10');

        // Encode clientId and secret in Base64 format
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
        $sensorDataResponse = Http::withHeaders($sensorDataHeaders)->post('https://app.dtuip.com/api/device/getSingleDeviceDatas', $sensorDataBody);

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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
            $historyUrl = 'https://app.dtuip.com/api/device/getSensorHistroy';

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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
            $historyUrl = 'https://app.dtuip.com/api/device/getSensorHistroy';

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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
                'sensorId' => 3885869, // Replace with the actual sensor ID
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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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








    // Temperature of TDS-----------------------------------end
    public function getlecelsensorvalue(Request $request){
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
        $clientId = '757c27c0bac14d3992a553daadc0b918';
        $clientSecret = '33e1a21a636448b7a12b887c59b79a87';
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
            'username' => 'Smart Water Infrastructure Management',
            'password' => 'swim1234',
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
