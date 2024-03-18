<?php $__env->startSection('content'); ?>

    
<div class="main-panel">
    <div class="content-wrapper">
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
        
        <div class="row">
            <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body  card-description ">
                        
                        <strong>Smart Meter 1 (m&#xB3;)</strong>
                        <h3 id="Smartmetter1" style="font-style: century gothic" ></h3>
                    
                        <p id="Smartmetter1time"></p>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body  card-description ">
                        
                        <strong>Smart Meter 2 (m&#xB3;)</strong>
                        <h3 id="Smartmetter2" style="font-style: century gothic" ></h3>
                    
                        <p id="Smartmetter2time"></p>

                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body  card-description ">
                        

                        <strong>Smart Meter 3 (m&#xB3;)</strong>
                        <h3 id="Smartmetter3" style="font-style: century gothic" > </h3>
                    
                        <p id="Smartmetter3time"></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body  card-description ">
                        

                        <strong>Smart Meter 4 (m&#xB3;)</strong>
                        <h3 id="Smartmetter4" style="font-style: century gothic" ></h3>
                    
                        <p id="Smartmetter4time"></p>
                        
                    </div>
                </div>
            </div>
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card ">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps1" type="hidden" value="0" />
        
                            <div id="ps1ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 1 (Bar)</p>
                            <p id="ps1time" class="text-center"></p>

                            
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps2" type="hidden" value="" >
        
                            <div id="ps2ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 2 (Bar)</p>
                            <p id="ps2time" class="text-center"></p>

                            
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps3" type="hidden" value="" >
        
                            <div id="ps3ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 3 (Bar)</p>
                            <p id="ps3time" class="text-center"></p>


                            
                        </div>
                        <div class="col-xl-3 col-sm-3 ">
                            
                            <input id="ps4" type="hidden" value="" >
        
                            <div id="ps4ans" class="gauge-container three"></div>
                            <p class="text-center">Pressure Sensor 4 (Bar)</p>
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