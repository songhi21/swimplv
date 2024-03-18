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
        $dataps1 = ['currentValue'=> $ps1233614970['data']['currentValue'],'status'=> $ps1233614970['data']['status'], 'preUnits'=> $ps1233614970['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps1233614970['data']['receiveTime']))];

       
        return response()->json($dataps1);
    }
    public function getDataps2()
    {
        // Fetch your data from the server or database

        $ps2233614971 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614971');
        

        $ps2233614971 = json_decode($ps2233614971, true);
        $dataps2 = ['currentValue'=> $ps2233614971['data']['currentValue'],'status'=> $ps2233614971['data']['status'], 'preUnits'=> $ps2233614971['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps2233614971['data']['receiveTime']))];

       
        return response()->json($dataps2);
    }
    public function getDataps3()
    {
        // Fetch your data from the server or database

        $ps3233614969 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614969');        

        $ps3233614969 = json_decode($ps3233614969, true);
        $dataps3 = ['currentValue'=> $ps3233614969['data']['currentValue'],'status'=> $ps3233614969['data']['status'], 'preUnits'=> $ps3233614969['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps3233614969['data']['receiveTime']))];

       
        return response()->json($dataps3);
    }

    public function getDataps4()
    {
        // Fetch your data from the server or database

        $articlesps4 = Http::get('http://111.19.141.81:8089/a/api/device?appkey=a46fa5b580fb44dba690c545e7a24371&secret=E8iR5ph8SCBXjwQSGkPT7NQPPXQTZvoH&deviceid=233614968');

        $ps4233614968 = json_decode($articlesps4, true);
        $dataps4 = ['currentValue'=> $ps4233614968['data']['currentValue'],'status'=> $ps4233614968['data']['status'], 'preUnits'=> $ps4233614968['data']['preUnits'],  'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($ps4233614968['data']['receiveTime']))];

       
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



        $dataswm = ['PositiveCumulativeFlow'=> $swm[0]['PositiveCumulativeFlow'],'CommunicationTime'=>  date('F d, Y, h:ia  ', strtotime($swm[0]['CommunicationTime'])),'error'=> 'success'];
       
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
        

        
        $dataswm2 = ['PositiveCumulativeFlow'=> $swm2[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm2[0]['CommunicationTime'])),'error'=> 'success'];

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



        $dataswm3 = ['PositiveCumulativeFlow'=> $swm3[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm3[0]['CommunicationTime'])),'error'=> 'success'];

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
    
    
        $dataswm4 = ['PositiveCumulativeFlow'=> $swm4[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm4[0]['CommunicationTime'])),'error'=> 'success'];

        return response()->json($dataswm4);
    }
    public function getDataSmartmetter4search()
    {
        // Fetch your data from the server or database

        $client4 = new Client();
    
        $responseas4 =  $client4->get('http://47.103.146.199:6071/WebHttpApi_EN/TYGetMeterData.ashx', [
                        "body" => "{'MeterIdList':['62992212211175'],'UserName':'EBC','PassWord':'123456'}"
                    ]);
        $output4 =  json_decode($responseas4->getBody()->getContents(), true);
        $swm4 = $output4['MeterDataList'];
    
    
        $dataswm4 = ['PositiveCumulativeFlow'=> $swm4[0]['PositiveCumulativeFlow'],'CommunicationTime'=> date('F d, Y, h:ia  ', strtotime($swm4[0]['CommunicationTime'])),'error'=> 'success'];
        // 'MeterId'=> $swm4[0]['MeterId'],
        return view('maps',contains('dataswm4'));
    }
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
}
