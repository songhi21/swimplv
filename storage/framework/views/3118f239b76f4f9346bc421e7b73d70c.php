
<input type="hidden" id="hiddenId" value="<?php echo e($id); ?>">
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
                            <div class="col-lg-6 col-xl-6">
                                <div id="idps"></div>
                                <div id="devicename"></div>
                                <div id="networktype"></div>
                                
                                <div id="status"></div>
                                <div id="receiveTime"></div>
                                <div id="currentValue"></div>
                                <div id="rssi"></div>
                                <div id="power"></div>
                                
                            </div>
                            <div class="col-lg-6 col-xl-6  text-right">
                                
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
                            <button type="button" class="btn btn-success text-right" id="exportExcel">Export to Excel</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.pslayoutshow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/admin/ps/show.blade.php ENDPATH**/ ?>