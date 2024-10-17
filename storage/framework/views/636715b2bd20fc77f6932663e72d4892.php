<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            
                <h3 class="page-title"> Pressure Sensor - Device Management</h3>

        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-xl-3 text-center">
                                <h3>Total number of Devices</h3>
                                <div id="totaldevices"></div>
                            </div>
                            <div class="col-lg-3 col-xl-3 text-center">
                                <h3>Number of Online Devices</h3>
                                <div id="totalonline"></div>
                            </div>
                            <div class="col-lg-6 col-xl-6  text-right">
                                <button type="button" class="btn btn-success" id="exportExcel"><span id="checkboxCount"> 0 </span> Export to Excel</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
        </div>
        
        <div >
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class='card' style="color: white!important">
                        <div class='card-body col-lg-12 col-xl-12'>
                            
                            <table class="table tablebg  display nowrap " id="result" style="width: 100%!important">
                                <thead >
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>DeviceId</th>
                                        <th>DeviceName</th>
                                        <th>NetworkType</th>
                                        <th>Equipmenttype</th>
                                        <th>Onlinestatus</th>
                                        <th>Updatetime</th>
                                        <th>Measurements</th>
                                        <th>SignalStrength</th>
                                        <th>BatteryVoltage</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?><?php /**PATH /home/swimproj/public_html/resources/views/admin/ps/content.blade.php ENDPATH**/ ?>