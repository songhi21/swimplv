<?php $__env->startSection('content'); ?>

    
<div class="main-panel" >
    <div class="content-wrapper" >
        <div class="row">
            
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
            
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card ">
                <div class="card-body " style="color: white!important">
                    <div class="row">
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps1" type="hidden" value="0" />
        
                            <div id="ps1ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 1 (Bar)</p>
                            <p class="text-center" id="ps1id"></p>
                            <p id="ps1time" class="text-center"></p>

                            
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps2" type="hidden" value="" >
        
                            <div id="ps2ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 2 (Bar)</p>
                            <p class="text-center" id="ps2id"></p>
                            <p id="ps2time" class="text-center"></p>

                            
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps3" type="hidden" value="" >
        
                            <div id="ps3ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 3 (Bar)</p>
                            <p class="text-center" id="ps3id"></p>
                            <p id="ps3time" class="text-center"></p>


                            
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps4" type="hidden" value="" >
        
                            <div id="ps4ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 4 (Bar)</p>
                            <p id="ps4id" class="text-center" ></p>
                            <p id="ps4time" class="text-center"></p>

                            
                        </div>
                    </div>



                    

                
                
                    
                


                </div>
            </div>
        </div>
        
    </div>
</div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/home.blade.php ENDPATH**/ ?>