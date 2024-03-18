



<?php $__env->startSection('content'); ?>
<div id="map2" >

    <div id="popup" class="ol-popup">
        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
        <div id="popup-content"></div>
    </div>
</div>
<div class="navspaces2"></div>

<div class="container">
    <input type="hidden" id="hiddenId" value="<?php echo e($id); ?>">
    <br>
    <br>
    <div id="arrayContainer">
        <!-- Array content will be displayed here -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mapsoutputresult2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/mapsoutput/result2.blade.php ENDPATH**/ ?>