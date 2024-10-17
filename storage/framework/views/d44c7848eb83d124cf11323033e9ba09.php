<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="<?php echo e(config('variable.url')); ?>css/core.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/SWim logo 2.png" />
    
    <link href="assets/css/firstletter.css" rel="stylesheet"/>
    
    <link href="assets/css/psstyle.css" rel="stylesheet"/>
    
    <link href="assets/css/datatables/buttons.bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet"/>
    <link href="css/loadingcss.css" rel="stylesheet">

    
    <style>
        #loading {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>



</head>
<body class="antialiased">
    
    <div id="loading-overlay">
        <div id="loading-spinner"></div>
    </div>
    <div class="container-scroller ">
        
        <?php echo $__env->make('layouts.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.topnavigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        <?php echo $__env->yieldContent('content'); ?>
    </div>



<script src="assets/vendors/js/vendor.bundle.base.js"></script>







<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>

<script src="assets/js/dashboard.js"></script>
<script src="js/hideerror.min.js"></script>
<script src="js/preventmultiple.min.js"></script>
<script src="assets/js/gwmwadmin/gwmw.js"></script>



<script src="assets/js/psjsadmin/datatables/dataTables.js"></script>
<script src="assets/js/psjsadmin/datatables/popper.min.js"></script>
<script src="assets/js/psjsadmin/datatables/dataTables.bootstrap.js"></script>
<script src="assets/js/psjsadmin/datatables/dataTables.buttons.js"></script>
<script src="assets/js/psjsadmin/datatables/buttons.bootstrap.js"></script>
<script src="assets/js/psjsadmin/datatables/jszip.min.js"></script>
<script src="assets/js/psjsadmin/datatables/pdfmake.min.js"></script>
<script src="assets/js/psjsadmin/datatables/vfs_fonts.js"></script>
<script src="assets/js/psjsadmin/datatables/buttons.html5.min.js"></script>
<script src="assets/js/psjsadmin/datatables/buttons.print.min.js"></script>

<script src="assets/js/gwmwadmin/gwmwtable.js"></script>
<script type="text/javascript" src="../assets/js/psjsadmin/datatables/xlsx.full.min.js"></script>

<script src="js/loadingjs.js"></script>








</body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/gwmwlayout.blade.php ENDPATH**/ ?>