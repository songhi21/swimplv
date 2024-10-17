<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head class="border-red">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SWIMP3')); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/leaftlet.css" />
    <link rel="stylesheet" href="../css/L.Control.Layers.Tree.css" />
    <link href="../css/loadingcss.css" rel="stylesheet">
       <!-- Make sure you put this AFTER Leaflet's CSS -->
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/esri-leaflet-geocoder.css">
    

    
    <link href="../css/btnnavchangecss.css" rel="stylesheet">
    <link href="../css/maps.css" rel="stylesheet" >
    <link rel="stylesheet" href="../assets/qml/5yrrh/resources/ol.css">
    <link rel="stylesheet" href="../assets/qml/5yrrh/resources/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/qml/5yrrh/resources/ol-layerswitcher.css">
    <link rel="stylesheet" href="../assets/qml/5yrrh/resources/qgis2web.css">


    <style>
        .search-layer {
            top: 100px;
            left: .5em;
        }
        .ol-touch .search-layer {
            top: 130px;
        }
    </style>
    <style>
    html, body {
        background-color: #ffffff;
    }
    .ol-control button {
        background-color: #f8f8f8 !important;
        color: #000000 !important;
        border-radius: 0px !important;
    }
    .ol-zoom, .geolocate, .gcd-gl-control .ol-control {
        background-color: rgba(255,255,255,.4) !important;
        padding: 3px !important;
    }
    .ol-scale-line {
        background: none !important;
    }
    .ol-scale-line-inner {
        border: 2px solid #f8f8f8 !important;
        border-top: none !important;
        background: rgba(255, 255, 255, 0.5) !important;
        color: black !important;
    }
    </style>

    <style>
    .geolocate {
        top: 65px;
        left: .5em;
    }
    .ol-touch .geolocate {
        top: 80px;
    }

    /* CSS */
    .button-49,
    .button-49:after {
    width: 150px;
    height: 76px;
    line-height: 78px;
    font-size: 20px;
    font-family: 'Bebas Neue', sans-serif;
    background: linear-gradient(45deg, transparent 5%,  #14c936 5%);
    border: 0;
    color: #fff;
    letter-spacing: 3px;
    box-shadow: 6px 0px 0px #00E6F6;
    outline: transparent;
    position: relative;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    }

    .button-49:after {
    --slice-0: inset(50% 50% 50% 50%);
    --slice-1: inset(80% -6px 0 0);
    --slice-2: inset(50% -6px 30% 0);
    --slice-3: inset(10% -6px 85% 0);
    --slice-4: inset(40% -6px 43% 0);
    --slice-5: inset(80% -6px 5% 0);
    
    content: 'ALTERNATE TEXT';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 3%, #00E6F6 3%, #00E6F6 5%, #FF013C 5%);
    text-shadow: -3px -3px 0px #F8F005, 3px 3px 0px #00E6F6;
    clip-path: var(--slice-0);
    }

    .button-49:hover:after {
    animation: 1s glitch;
    animation-timing-function: steps(2, end);
    }

        @keyframes glitch {
        0% {
            clip-path: var(--slice-1);
            transform: translate(-20px, -10px);
        }
        10% {
            clip-path: var(--slice-3);
            transform: translate(10px, 10px);
        }
        20% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 10px);
        }
        30% {
            clip-path: var(--slice-3);
            transform: translate(0px, 5px);
        }
        40% {
            clip-path: var(--slice-2);
            transform: translate(-5px, 0px);
        }
        50% {
            clip-path: var(--slice-3);
            transform: translate(5px, 0px);
        }
        60% {
            clip-path: var(--slice-4);
            transform: translate(5px, 10px);
        }
        70% {
            clip-path: var(--slice-2);
            transform: translate(-10px, 10px);
        }
        80% {
            clip-path: var(--slice-5);
            transform: translate(20px, -10px);
        }
        90% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 0px);
        }
        100% {
            clip-path: var(--slice-1);
            transform: translate(0);
        }
        }

        @media (min-width: 768px) {
        .button-49,
        .button-49:after {
            width: 200px;
            height: 86px;
            line-height: 88px;
        }
    }
    </style>


   
 


</head>
    <body >
        
        
        <div id="loading-overlay">
            <div id="loading-spinner"></div>
        </div>

        <div class="container overlay">
            <br>
            <nav class="navbar navbar-expand-lg navbar-dark bgnav">
                <div class="container image_wrapper">
                    <a class="navbar-brand" href="<?php echo e(config('variable.url')); ?>/" style="font-weight:bold!important">
                        <img src="../image/p3.png" width="80" height="60" alt="" >
                        <span style="font-weight: bold; color:rgb(17, 17, 17);font-family: Lucida Handwriting;">Swim Project 3 </span>
                        <span style="font-weight: bold; color:rgb(17, 17, 17)">| </span>
                    </a>
                    
                    <span style="font-size: 100%;  color:rgb(17, 17, 17); ">  Storm Water Harvesting Facility Decision Support</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left-aligned items -->
                    <ul class="navbar-nav me-auto">
                    
                    </ul>
                    <!-- Right-aligned items -->
                    <ul class="navbar-nav text-navconf">
                        <li class="nav-item">
                            <a aria-current="page" href="<?php echo e(config('variable.url')); ?>/" class="<?php echo e(Request::segment(1) == '' ? 'bn632-hover bn26' : null); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>../about"  class="<?php echo e(Request::segment(1) == 'about' ? 'bn632-hover bn26' : null); ?>">About</a>
                        </li>
                        <li >
                            <li class="nav-item dropdown">
                                <a   role="button" class="bn632-hover bn26 nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>../maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>../mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>

                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>../login">Login</a>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
        <div class="container-scroller ">
            


            

            <script src="https:///ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript" src="../assets/js/mapsoutput/result.js"></script>
            <script src="../js/loadingjs.js"></script>
            
            

            
            <script src="../assets/qml/5yrrh/resources/qgis2web_expressions.js"></script>
            <script src="../assets/qml/5yrrh/resources/proj4.js"></script>
            <script>proj4.defs('EPSG:32651','+proj=utm +zone=51 +datum=WGS84 +units=m +no_defs');</script>
            <script src="../assets/qml/5yrrh/resources/polyfills.js"></script>
            <script src="../assets/qml/5yrrh/resources/functions.js"></script>
            <script src="../assets/qml/5yrrh/resources/ol.js"></script>
            <script src="../assets/qml/5yrrh/resources/ol-layerswitcher.js"></script>
            
            
            <script src="../assets/qml/5yrrh/layers/Cauayan_City_4.js"></script>
            <script src="../assets/qml/5yrrh/layers/CauayanFH5YRRRP_5.js"></script>
            <script src="../assets/qml/5yrrh/styles/Cauayan_City_4_style.js"></script>
            
            <script src="../assets/qml/5yrrh/layers/CauayanFH25YRRRP_4.js"></script>
            <script src="../assets/qml/5yrrh/styles/CauayanFH25YRRRP_4_style.js"></script>
            
            <script src="../assets/qml/5yrrh/layers/CauayanFH100YRRRP_4.js"></script>
            <script src="../assets/qml/5yrrh/styles/CauayanFH100YRRRP_4_style.js"></script>

            

        
            <script src="../assets/qml/5yrrh/styles/CauayanFH5YRRRP_5_style.js"></script>
            <script src="../assets/qml/5yrrh/layers/layers.js" type="text/javascript"></script> 
            <script src="../assets/qml/5yrrh/resources/Autolinker.min.js"></script>
            <script src="../assets/qml/5yrrh/resources/qgis2web.js"></script>





            <script>
            
                    

                        //---------------------loading layer-------------------------------------


                        // Show the spinner when the page is loading
                        // map.spin(true);

                        // // Stop the spinner when the page has finished loading
                        // window.addEventListener('load', function () {
                        //     map.spin(false);
                        // });
                        //----------------------------------------------------------------


            </script>
            
    
            
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/mapsoutputresult.blade.php ENDPATH**/ ?>