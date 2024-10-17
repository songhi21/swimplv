@extends('layouts.admindashboard')
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
<div class="main-panel" >
    <div class="content-wrapper" >
        <div class="row">
            {{-- banner 1 --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
                <div class="row align-items-center">
                <div class="col-4 col-sm-3 col-xl-2">
                    <img src="assets/images/SWim logo 2.png" class="gradient-corona-img img-fluid" alt="">
                </div>
                <div class="col-5 col-sm-7 col-xl-8 p-0">
                    <h4 class="mb-1 mb-sm-0 textcolorwhite">Welcome to Swim Project 3 Central Hub</h4>
                    <p class="mb-0 font-weight-normal d-none d-sm-block textcolorwhite">Centralize Data structure</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        
        {{-- <div class="row"> --}}
            <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body ">
                        <h3>Ground Water Monitoring Well</h3>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="image/ph (1).png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>PH</b>
                                    <p id="phid">Sensor ID: </p>
                                    <h3 id="phval">pH Value: </h3>
                                    <p id="phtime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                            <!-- Repeat the structure for other columns -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="image/thermometer.png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>Temperature of PH</b>
                                    <p id="topid">Sensor ID: </p>
                                    <h3 id="topval">Temperature Value: </h3>
                                    <p id="toptime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="image/electric-current.png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>Conductivity</b>
                                    <p id="conductivityid">Sensor ID: </p>
                                    <h3 id="conductivityval">Conductivity Value: </h3>
                                    <p id="conductivitytime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="image/tds.png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>TDS</b>
                                    <p id="tdsid">Sensor ID: </p>
                                    <h3 id="tdsval">TDS Value: </h3>
                                    <p id="tdstime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <img src="image/salinity.png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>Salinity</b>
                                    <p id="salinityid">Sensor ID: </p>
                                    <h3 id="salinityval">Salinity Value: </h3>
                                    <p id="salinitytime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <img src="image/temperature-sensor.png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>Temperature of TDS</b>
                                    <p id="TemperatureofTDSid">Sensor ID: </p>
                                    <h3 id="TemperatureofTDSval">Temperature Value: </h3>
                                    <p id="TemperatureofTDStime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <img src="image/water-level.png" style="width: 110px; float: left; margin-right: 10px;">
                                <div>
                                    <b>Level sensor</b>
                                    <p id="levelsensorid">Sensor ID: </p>
                                    <h3 id="levelsensorval">Level Value: </h3>
                                    <p id="levelsensortime">Last Updated: </p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body card-description" style="color: white!important">
                            <img src="image/swm.png" style="width: 110px; float: left; margin-right: 10px;">
                            <div>
                                <b>Smart Meter 1 (m&#xB3;)</b>
                                <p id="Smartmetter1id" style="color: white!important">Sensor ID: </p>
                                <h3 id="Smartmetter1" style="font-style: century gothic">Meter Reading: </h3>
                                <p id="Smartmetter1time">Last Updated: </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repeat the structure for other smart meters -->
                <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body card-description" style="color: white!important">
                            <img src="image/swm.png" style="width: 110px; float: left; margin-right: 10px;">
                            <div>
                                <b>Smart Meter 2 (m&#xB3;)</b>
                                <p id="Smartmetter2id">Sensor ID: </p>
                                <h3 id="Smartmetter2" style="font-style: century gothic">Meter Reading: </h3>
                                <p id="Smartmetter2time">Last Updated: </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body card-description" style="color: white!important">
                            <img src="image/swm.png" style="width: 110px; float: left; margin-right: 10px;">
                            <div>
                                <b>Smart Meter 3 (m&#xB3;)</b>
                                <p id="Smartmetter3id">Sensor ID: </p>
                                <h3 id="Smartmetter3" style="font-style: century gothic">Meter Reading: </h3>
                                <p id="Smartmetter3time">Last Updated: </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body card-description" style="color: white!important">
                            <img src="image/swm.png" style="width: 110px; float: left; margin-right: 10px;">
                            <div>
                                <b>Smart Meter 4 (m&#xB3;)</b>
                                <p id="Smartmetter4id">Sensor ID: </p>
                                <h3 id="Smartmetter4" style="font-style: century gothic">Meter Reading: </h3>
                                <p id="Smartmetter4time">Last Updated: </p>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card ">
                <div class="card-body " style="color: white!important">
                    <div class="row">
                        <div class="col-xl-3 col-sm-3 ">
                            {{-- pressuresensor --}}
                            <input id="ps1" type="hidden" value="0" />
        
                            <div id="ps1ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 1 (Bar)</p>
                            <p class="text-center" id="ps1id"></p>
                            <p id="ps1time" class="text-center"></p>

                            {{-- pressuresensor --}}
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            {{-- pressuresensor --}}
                            <input id="ps2" type="hidden" value="" >
        
                            <div id="ps2ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 2 (Bar)</p>
                            <p class="text-center" id="ps2id"></p>
                            <p id="ps2time" class="text-center"></p>

                            {{-- pressuresensor --}}
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            {{-- pressuresensor --}}
                            <input id="ps3" type="hidden" value="" >
        
                            <div id="ps3ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 3 (Bar)</p>
                            <p class="text-center" id="ps3id"></p>
                            <p id="ps3time" class="text-center"></p>


                            {{-- pressuresensor --}}
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            {{-- pressuresensor --}}
                            <input id="ps4" type="hidden" value="" >
        
                            <div id="ps4ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 4 (Bar)</p>
                            <p id="ps4id" class="text-center" ></p>
                            <p id="ps4time" class="text-center"></p>

                            {{-- pressuresensor --}}
                        </div>
                    </div>



                    

                
                
                    
                


                </div>
            </div>
        </div>
        {{-- <div class="col-xl-6 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body card-description">
                    <p>Program Leader/Sex: Dr. Orlando F. Balderama/Male</p>
                    <p> Project Leader/Sex: Dr. Rafael J. Padre/Male</p>
                    <p>  Agency: Isabela State University</p>
                    <p> Address/Telephone/Fax/Email: San Fabian, Echague, Isabela/ rjpadre@isu.edu.ph</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body card-description">
                <p> COOPERATING AGENCY/IES: LGU Cauayan City</p>
                <p> SITE(S) OF IMPLEMENTATION (Municipality / District / Province / Region)</p>
                <p>    Base Station: Cauayan City , Isabela, Region 2</p>
                <p>Other Site(s) of Implementation: None</p>
                    
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <img src="assets/images/SWim logo 2.png" width="100%">
            </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body card-description">
                
                    <h1> Dashboard  </h1>
                    <p >Cauayan City in Isabela is one of the country’s premier agro-industrial hubs and also one of the Philippines’ first smart cities (Smart Communications, 2019), recognized by the Department of Science and Technology (DOST) for  its  innovation  in  adopting  science and technology development (Alvarez, M.S. et.al., 2020). Since urban areas, such as Cauayan City, are the hub of economic development and activity, there is a tendency for people and businesses to converge which results in higher water demand.
                        At present, Cauayan has a total  fifteen (15) water pumping stations and eight (8) elevated water tanks serving only 12,067 households (29%) out of 30,207 households (71%).   The  combined distribution efficiency of these water infrastructures under  the management and supervision  of the Cauayan City Water District (CCWD) is only  87% which is accounted from the 9,229.63 m3 of metered water out of the distributed water of 10,518.13 m3 daily or with a combined distribution losses of   10% which is  1282.50m3 losses per day, ( Alvarez  M. S. et.al., 2020).  The said study  suggests  the  necessity to introduce new and innovative water management technologies and systems adapted to climate change to addressed the need of the city like; improve the  performance of the  existing water infrastructure systems,  lack of management tool  for  more efficient delivery of water services, limited service coverage of the water district due to limited water resource and depletion and contamination of aquifers and other water sources since shallow aquifer are mainly  utilized. Hence, a  GIS-based decision support tool in managing urban water infrastructure with storm water invention is a proposed solution  to address the need of the city.
                        </p>
                    <p>In order to maximize and properly utilize  water  infrastructure, the integration of decision support systems (DSS) and geographic information systems (GIS) is needed to provide the necessary spatial database for transforming a simple spatial query and visualization tool into a powerful analytical and spatially distributed modeling tool (Satti, S.R., et.al. 2004). Reitsma (1996) define a DSS for water resources applications as computer-based systems which integrate state information, dynamic or process information, and plan evaluation tools into a single software implementation.  One of the tools that can be used as DSS is the MIKE Operation. It is a complete GIS-integrated modelling tool that enables users to make sound decisions and create future concepts for urban stormwater systems  - concepts that are cost-effective as well as resilient to change <a href="https://www.mikepoweredbydhi.com">https://www.mikepoweredbydhi.com</a>. </p>
                </div>
            </div>
        </div> --}}
    </div>
</div>








{{-- </div> --}}
@endsection
