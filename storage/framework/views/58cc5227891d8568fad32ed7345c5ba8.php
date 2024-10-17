<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    

    <!-- Fonts -->
    
    <link href="<?php echo e(config('variable.url')); ?>../css/core.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/SWim logo 2.png" />

    <link href="../assets/css/firstletter.css" rel="stylesheet"/>

    <link href="../assets/css/psstyle.css" rel="stylesheet"/>

    <link href="../assets/css/datatables/buttons.bootstrap.css" rel="stylesheet"/>
    <link href="../assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet"/>
    <link href="../css/loadingcss.css" rel="stylesheet">

    
    <link rel="stylesheet" href="../css/leaftlet.css" />
    <link rel="stylesheet" href="../css/L.Control.Layers.Tree.css" />
       <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="../js/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    

    <link rel="stylesheet" type="text/css" href="../css/esri-leaflet-geocoder.css">
    <script src="../js/esri-leaflet.js"></script>

    <script src="../js/esri-leaflet-geocoder.js"></script>

    <link rel="stylesheet" href="../css/maps.css">



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
        
        <?php echo $__env->make('layouts.sidenavshow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.topnavigationshow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        <?php echo $__env->yieldContent('content'); ?>
    </div>



<script src="../assets/vendors/js/vendor.bundle.base.js"></script>


<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/misc.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/todolist.js"></script>

<script src="../assets/js/dashboard.js"></script>
<script src="../js/hideerror.min.js"></script>
<script src="../js/preventmultiple.min.js"></script>


<script src="../assets/js/psjsadmin/datatables/dataTables.js"></script>
<script src="../assets/js/psjsadmin/datatables/popper.min.js"></script>
<script src="../assets/js/psjsadmin/datatables/dataTables.bootstrap.js"></script>
<script src="../assets/js/psjsadmin/datatables/dataTables.buttons.js"></script>
<script src="../assets/js/psjsadmin/datatables/buttons.bootstrap.js"></script>
<script src="../assets/js/psjsadmin/datatables/jszip.min.js"></script>
<script src="../assets/js/psjsadmin/datatables/pdfmake.min.js"></script>
<script src="../assets/js/psjsadmin/datatables/vfs_fonts.js"></script>
<script src="../assets/js/psjsadmin/datatables/buttons.html5.min.js"></script>
<script src="../assets/js/psjsadmin/datatables/buttons.print.min.js"></script>


<script src="../assets/js/canvasjs.min.js"></script>

<script src="../assets/js/psjsadmin/psshow.js"></script>

<script src="../assets/js/psjsadmin/psshowhistory.js"></script>
<script type="text/javascript" src="../assets/js/psjsadmin/datatables/xlsx.full.min.js"></script>

<script src="../js/loadingjs.js"></script>


<script src="../js/maps/L.KML.js"></script>
<script src="../js/maps/spin.min.js" charset="utf-8"></script>
<script src="../js/maps/leaflet.spin.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/L.Control.Layers.Tree.js"></script>

<script type="text/javascript" src="../js/proj4.js"></script>


<script type="text/javascript" src="../js/proj4leaflet.min.js"></script>

<script type="text/javascript" src="../js/coord-projection.js"></script>
<script src="https://unpkg.com/leaflet.kml"></script>
<script>
        console.log(<?php echo e($id); ?>);
        //Maplayer type --------------------------------------------
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });
        


        //----icon-------------------------------------------------------------------
        var psicon = L.icon({
            iconUrl: '../image/ps.png',
            shadowUrl: '../image/marker-shadow.png',

            iconSize:     [38, 55], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
            shadowAnchor: [40, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        var swmicon = L.icon({
            iconUrl: '../image/swm.png',
            shadowUrl: '../image/marker-shadow.png',

            iconSize:     [32, 55], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
            shadowAnchor: [40, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        //------------------------------------------------------------------------------
        const map = L.map('map3', {
            center: [16.95248, 121.76696],
            zoom: 19,
            zoomControl: true,
            layers: [tiles]
        });
        //----maplayer end----------------------------------
        //-----pressure sensors----------------------------------------

        if(<?php echo e($id); ?> == 233614970){
            const Pressuresensor = L.marker([16.95184,121.76739], {icon: psicon}).addTo(map);
        }
        else if(<?php echo e($id); ?> == 233614971){
            //-----endps1-------
            const Pressuresensor2 = L.marker([16.95309,121.76623], {icon: psicon}).addTo(map);
        }
        else if(<?php echo e($id); ?> == 233614969){
            //-----endps1-------
            const Pressuresensor3 = L.marker([16.95283,121.76595], {icon: psicon}).addTo(map);
        }
        else if(<?php echo e($id); ?> == 233614968){
                
            const Pressuresensor4 = L.marker([16.95258,121.76677], {icon: psicon}).addTo(map);
        }
        





        // const Smartwatermeter = L.marker([16.95325, 121.76689], {title: 'Smart water Meter 1',icon: swmicon}).addTo(map);

        // //--Smartwatermeter2-------------------------------------------------
        
        // const Smartwatermeter2 = L.marker([16.95301, 121.76626], {title: 'Smart water Meter 2',icon: swmicon}).addTo(map);
        
        // //--Smartwatermeter3-------------------------------------------------
        // const Smartwatermeter3 = L.marker([16.95284, 121.7661], {title: 'Smart water Meter 3',icon: swmicon}).addTo(map);

        // //--Smartwatermeter4-------------------------------------------------
        // const Smartwatermeter4 = L.marker([16.95313, 121.76621],{title: 'Smart water Meter 4', icon: swmicon}).addTo(map);
        



            
        //-------------------------------------end


        //---------------------loading layer-------------------------------------


        // Show the spinner when the page is loading
        map.spin(true);

        // Stop the spinner when the page has finished loading
        window.addEventListener('load', function () {
            map.spin(false);
        });
        //----------------------------------------------------------------


</script>


<script type="text/javascript">
let kosovarefCrs = new L.Proj.CRS('EPSG:4326');



new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
 attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
   label: 'OpenStreetMap',
  minZoom: 2,
}).addTo(map);

L.control.coordProjection({
    crs: kosovarefCrs,
}).addTo(map);
</script>









</body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views////layouts/pslayoutshow.blade.php ENDPATH**/ ?>