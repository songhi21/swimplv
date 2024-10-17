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
    <link href="css/gauagecss.css" rel="stylesheet"/>
    <link href="css/loadingcss.css" rel="stylesheet">
    
    <style>
        .info {
          padding: 20px;
        }
        .example {
          overflow: auto;
          border-bottom: 1px solid rgba(0,0,0,0.6);
          box-sizing: border-box;
          clear: both;
          margin-bottom: 30px;
        }
        .example > .code, .example > .display {
          box-sizing: border-box;
          padding: 10px;
        }
        /* .example > .code {
        }
        .example > .display {
          text-align: center;
          overflow: auto;
          padding: 20px 0;
          overflow: hidden;
        }
        .example > .display {
        } */
  
        pre {
          padding: 0;
          margin: 0;
        }
  
  
  
        @media only screen and (min-device-width: 768px) {
          .gauge-container {
            width: 200px;
            height: 200px;
          }
          .example > .code {
            width: 65%;
            float: left;
          }
          .example > .display {
            width: 35%;
            float: right;
            padding: 10px;
          }
        }
    </style>
    <script type="text/javascript" src="assets/css/fetch/highlight.pack.js"> </script>
    <script>hljs.initHighlightingOnLoad();</script>


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
<script src="assets/js/firstletter.js" type="text/javascript"></script>

<script src="assets/vendors/chart/Chart.min.js"></script>
<script src="assets/vendors/chart/clearinputtext.js" type="text/javascript"></script>


<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>

<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>

<script src="assets/js/dashboard.js"></script>
<script src="js/hideerror.min.js"></script>
<script src="js/preventmultiple.min.js"></script>
<script src="js/maps/smartwatermeter.js"></script>
<script src="assets/js/fetch/gauge.min.js"></script>
<script src="js/maps/PS.js"></script>
<script src="js/maps/Ph.js"></script>
<script src="js/maps/tempofph.js"></script>
<script src="js/maps/conductivity.js"></script>
<script src="js/maps/tds.js"></script>
<script src="js/maps/sanity.js"></script>
<script src="js/maps/totds.js"></script>
<script src="js/maps/levelsensor.js"></script>




<script>

  
    var gauge0 = Gauge(document.getElementById("ps1ans"),
    {
      max: 100
    });

    var gauge2 = Gauge(document.getElementById("ps2ans"),
    {
      max: 100
    });

    var gauge3 = Gauge(document.getElementById("ps3ans"),
    {
      max: 100
    });

    var gauge4 = Gauge(document.getElementById("ps4ans"),
    {
      max: 100
    });
    // var value1 = Math.random() * 100,

    // gauge0.setValue(value1);
    // gauge1.setValueAnimated(value1, 1);
    // console.log(document.getElementById("Smartmetter1ans").value);
    


    // gauge0.setValueAnimated(value1, 1);
    // var gauge5 = Gauge(
    //     document.getElementById("gauge5"),
		//     {
    //       max: 200,
    //       dialStartAngle: 0,
    //       dialEndAngle: -180,
    //       viewBox: "0 35 100 100",
    //       value: 50
    //     }
    //   );


    (function loop() {
      var value1 = document.getElementById("ps1").value;

      var value2 = document.getElementById("ps2").value;

      var value3 = document.getElementById("ps3").value;

      var value4 = document.getElementById("ps4").value;


        gauge0.setValueAnimated(value1, 1);
        gauge2.setValueAnimated(value2, 1);
        gauge3.setValueAnimated(value3, 1);
        gauge4.setValueAnimated(value4, 1)
        window.setTimeout(loop, 100);
      })();

  </script>
  <script src="js/loadingjs.js"></script>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/admindashboard.blade.php ENDPATH**/ ?>