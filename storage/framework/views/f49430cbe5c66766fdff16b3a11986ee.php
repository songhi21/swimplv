


<?php $__env->startSection('content'); ?>
<input name="hiddenId" type="hidden" id="hiddenId" value="<?php echo e($id); ?>">
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            
                <h3 class="page-title"> Groundwater monitoring well - Device Management</h3>

        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <h3>Basic Information</h3>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <p>Device Id: <span id="idps"></span></p>
                                <p>Device Name: <span id="devicename"></span></p>
                                <p>Unit: <span id="Unit"></span></p>
                                <p>Receive Time: <span  id="updateDate"></span></p>

                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <p>Current Value: <span id="val"></span></p>
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
                        <div class='card-body col-lg-12 col-xl-12 text-right'>
                            <button type="button" class="btn btn-success " id="exportExcel"><span id="checkboxCount">0</span> Export to Excel</button>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start">Start Date and Time:</label>
                                        <div class="input-group">
                                            <!-- Use datetime-local input for browsers that support it -->
                                            <input type="datetime-local" id="start" class="form-control datetime-local-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end">End Date and Time:</label>
                                        <div class="input-group">
                                                <!-- Use datetime-local input for browsers that support it -->
                                            <input type="datetime-local" id="end" class="form-control datetime-local-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" id="btnSubmit" type="button">Submit</button>
                                    
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="devhistory-tablegwmw" class="table tablebg  display nowrap "  style="width: 100%!important">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="selectAll"></th>
                                                <th class="text-left">DeviceID</th>
                                                <th class="text-left">DeviceName</th>
                                                <th  class="text-left">Value</th>
                                                <th  class="text-left">Date and Time</th>
                                                <!-- Add other table headers here -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table body will be populated dynamically by DataTables -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row ">
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Device location</h3>
                    </div>
                    <div class="card-body">
                        
                        <div id="map3" ></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Graph</h3>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;">
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.gwmwlayoutshow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/admin/gwmw/show.blade.php ENDPATH**/ ?>