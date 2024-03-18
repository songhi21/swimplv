<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head class="border-red">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SWIMP3')); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/leaftlet.css" />
    <link rel="stylesheet" href="css/L.Control.Layers.Tree.css" />
       <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="js/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    
   
       <link rel="stylesheet" type="text/css" href="css/esri-leaflet-geocoder.css">
       <script src="js/esri-leaflet.js"></script>

       <script src="js/esri-leaflet-geocoder.js"></script>
   

       
       
   <link rel="stylesheet" href="css/maps.css">

   
   <link href="css/btnnavchangecss.css" rel="stylesheet">
   <link href="css/floatbtnemail.css" rel="stylesheet">
   
    <!-- Include QGIS2Leaflet generated JavaScript -->
    <script src="path_to_qgis2leaflet_exported_code/leaflet-map.js"></script>


</head>
    <body >
        <div id="loadingIndicator">Loading...</div>
        
        
        <div class="container overlay">
            <br>
            <nav class="navbar navbar-expand-lg navbar-dark bgnav">
                <div class="container image_wrapper">
                    <a class="navbar-brand" href="<?php echo e(config('variable.url')); ?>/" style="font-weight:bold!important">
                        <img src="image/p3.png" width="80" height="60" alt="" >
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
                            <a  href="<?php echo e(config('variable.url')); ?>about"  class="<?php echo e(Request::segment(1) == 'about' ? 'bn632-hover bn26' : null); ?>">About</a>
                        </li>
                        <li >
                            <li class="nav-item dropdown">
                                <a   role="button" class="<?php echo e(Request::segment(1) == 'maps' ? 'bn632-hover bn26' : null); ?> nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(config('variable.url')); ?>mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>

                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(config('variable.url')); ?>login">Login</a>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
        <div class="container-scroller ">
            


            

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/maps/L.KML.js"></script>
            <script src="js/maps/spin.min.js" charset="utf-8"></script>
            <script src="js/maps/leaflet.spin.min.js" charset="utf-8"></script>
            <script type="text/javascript" src="js/L.Control.Layers.Tree.js"></script>
            
            <script type="text/javascript" src="js/proj4.js"></script>
            

            <script type="text/javascript" src="js/proj4leaflet.min.js"></script>

            <script type="text/javascript" src="js/coord-projection.js"></script>
            <script src="https://unpkg.com/leaflet.kml"></script>
            <script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
            



            <script>
            
                    // display map view----------------------------
                        // const map = L.map('map').setView([16.95248, 121.76696], 21);


                        //Maplayer type --------------------------------------------
                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 18,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            });
                        const osmHOT = L.tileLayer('https://tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                                maxZoom: 18,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            });
                        // const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                        //     maxZoom: 19,
                        //     attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
                        // });
                        const world_imagry = L.tileLayer('http://server.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            maxZoom: 17,
                            // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        });
                        const world_topo = L.tileLayer('https://services.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                            maxZoom: 17, 
                            zoomOffsetAllowance: 0.1, 
                            errorTileUrl: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAA…AAAAAAAAAAAAAAAAA7waBAAABw08RwAAAAABJRU5ErkJggg==",
                            minZoom: 0, 
                            subdomains: Array(3),
                            zoomOffset: 0, tms: false, zoomReverse: false, detectRetina: false, crossOrigin: false, referrerPolicy: false, tileSize: 256, opacity: 1, updateWhenIdle: false, updateWhenZooming: true, updateInterval: 200, zIndex: 3, bounds: null, maxNativeZoom: undefined
                        });

                        //---------------------------------------------------------------------


                        //----icon-------------------------------------------------------------------
                        var psicon = L.icon({
                            iconUrl: 'image/ps.png',
                            shadowUrl: 'image/marker-shadow.png',

                            iconSize:     [38, 55], // size of the icon
                            shadowSize:   [50, 64], // size of the shadow
                            iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
                            shadowAnchor: [40, 62],  // the same for the shadow
                            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                        });
                        var swmicon = L.icon({
                            iconUrl: 'image/swm.png',
                            shadowUrl: 'image/marker-shadow.png',

                            iconSize:     [32, 55], // size of the icon
                            shadowSize:   [50, 64], // size of the shadow
                            iconAnchor:   [22, 54], // point of the icon which will correspond to marker's location
                            shadowAnchor: [40, 62],  // the same for the shadow
                            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                        });
                        //------------------------------------------------------------------------------
                        const map = L.map('map', {
                            center: [16.95248, 121.76696],
                            zoom: 8,
                            zoomControl: true,
                            layers: [world_imagry]
                        });
                        //----maplayer end----------------------------------
                        //-----pressure sensors----------------------------------------
                        const psg = L.layerGroup();
                        const Pressuresensor = L.marker([16.95184,121.76739], {icon: psicon}).addTo(psg);
                        
                        function updatePopupps1() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataps-1',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataps1) {
                                    // Update the popup content with Laravel controller return value
                                    Pressuresensor.bindPopup('<b>About Pressure Sensor 1</b></br> '  +  '</br> Status :  Online'+'<br>Current Value: '+ dataps1.currentValue + '<br>Pre Units: '+ dataps1.preUnits+ '<br> As of: '+ dataps1.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Pressuresensor.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                        }
                        // Open popup and fetch data when marker is clicked
                        Pressuresensor.on('click', function () {
                            updatePopupps1();
                        });
                        //-----endps1-------
                        const Pressuresensor2 = L.marker([16.95309,121.76623], {icon: psicon}).addTo(psg);
                        function updatePopupps2() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataps-2',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataps2) {
                                    // Update the popup content with Laravel controller return value
                                    Pressuresensor2.bindPopup('<b>About Pressure Sensor 2</b></br> '  +  '</br> Status :  Online'+'<br>Current Value: '+ dataps2.currentValue + '<br>Pre Units: '+ dataps2.preUnits+ '<br> As of: '+ dataps2.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Pressuresensor2.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                        }
                        // Open popup and fetch data when marker is clicked
                        Pressuresensor2.on('click', function () {
                            updatePopupps2();
                        });
                        //----endps2-----
                        
                        //---ps3--------
                        const Pressuresensor3 = L.marker([16.95283,121.76595], {icon: psicon}).addTo(psg);
                        
                        function updatePopupps3() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataps-3',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataps3) {
                                    // Update the popup content with Laravel controller return value
                                    Pressuresensor3.bindPopup('<b>About Pressure Sensor 3</b></br> '  +  '</br> Status :  Online'+'<br>Current Value: '+ dataps3.currentValue + '<br>Pre Units: '+ dataps3.preUnits+ '<br> As of: '+ dataps3.CommunicationTime ).openPopup();
                                    map.spin(false);
                                    console.log('success');
                                },
                                error: function (error) {
                                    Pressuresensor3.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                        }
                        // Open popup and fetch data when marker is clicked
                        Pressuresensor3.on('click', function () {
                            updatePopupps3();
                        });
                        
                        //----endps3-----
                        //---ps4--------
                        const Pressuresensor4 = L.marker([16.95258,121.76677], {icon: psicon}).addTo(psg);
                        
                        function updatePopupps4() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataps-4',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataps4) {
                                    // Update the popup content with Laravel controller return value
                                    Pressuresensor4.bindPopup('<b>About Pressure Sensor 4</b></br> '  +  '</br> Status :  Online'+'<br>Current Value: '+ dataps4.currentValue + '<br>Pre Units: '+ dataps4.preUnits+ '<br> As of: '+ dataps4.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Pressuresensor4.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                        }
                        // Open popup and fetch data when marker is clicked
                        Pressuresensor4.on('click', function () {
                            updatePopupps4();
                        });
                        
                        
                        
                        
                        
                        //--endps4----------------
                        //end-----------------------------------------------------
                        //grouplayers-------------------------------------------------------
                        //grouplayersSWM-------------------------------------------------------

                        const swmg = L.layerGroup();
                        //--Smartwatermeter-------------------------------------------------

                        const Smartwatermeter = L.marker([16.95325, 121.76689], {title: 'Smart water Meter 1',icon: swmicon}).addTo(swmg);
                        function updatePopupsm() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataSmartmetter-1',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataswm) {
                                    // Update the popup content with Laravel controller return value
                                    Smartwatermeter.bindPopup('<b>About Water Meter 1</b></br> '  +  '</br> Status :  Online'+'<br>Positive Cumulative Flow: '+ dataswm.PositiveCumulativeFlow + '<br>Pre Units: m³' + '<br> As of: '+ dataswm.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Smartwatermeter.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                            });
                        }
                                        // Open popup and fetch data when marker is clicked
                        Smartwatermeter.on('click', function () {
                            updatePopupsm();
                        });
                        //----------------------endrequestdatajquery--------------------------
                        
                        //--Smartwatermeter2-------------------------------------------------
                        
                        const Smartwatermeter2 = L.marker([16.95301, 121.76626], {title: 'Smart water Meter 2',icon: swmicon}).addTo(swmg);
                        function updatePopupsm2() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataSmartmetter-2',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataswm2) {
                                    // Update the popup content with Laravel controller return value
                                    Smartwatermeter2.bindPopup('<b>About Water Meter 2</b></br> '  +  '</br> Status :  Online'+'<br>Positive Cumulative Flow: '+ dataswm2.PositiveCumulativeFlow + '<br>Pre Units: m³' + '<br> As of: '+ dataswm2.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Smartwatermeter2.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                            }
                                        // Open popup and fetch data when marker is clicked
                        Smartwatermeter2.on('click', function () {
                            updatePopupsm2();
                        });
                        //----------------------endrequestdatajquery--------------------------
                        
                        //--Smartwatermeter3-------------------------------------------------
                        const Smartwatermeter3 = L.marker([16.95284, 121.7661], {title: 'Smart water Meter 3',icon: swmicon}).addTo(swmg);
                        function updatePopupsm3() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataSmartmetter-3',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataswm3) {
                                    // Update the popup content with Laravel controller return value
                                    Smartwatermeter3.bindPopup('<b>About Water Meter 3</b></br> '  +  '</br> Status :  Online'+'<br>Positive Cumulative Flow: '+ dataswm3.PositiveCumulativeFlow + '<br>Pre Units: m³' + '<br> As of: '+ dataswm3.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Smartwatermeter3.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                            }
                                        // Open popup and fetch data when marker is clicked
                        Smartwatermeter3.on('click', function () {
                            updatePopupsm3();
                        });
                        //----------------------endrequestdatajquery--------------------------
                        //--Smartwatermeter4-------------------------------------------------
                        const Smartwatermeter4 = L.marker([16.95313, 121.76621],{title: 'Smart water Meter 4', icon: swmicon}).addTo(swmg);
                        function updatePopupsm4() {
                            // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
                            $.ajax({
                                url: '/getDataSmartmetter-4',
                                method: 'GET',
                                beforeSend: function(){
                                    map.spin(true);
                                },
                                success: function (dataswm4) {
                                    // Update the popup content with Laravel controller return value
                                    Smartwatermeter4.bindPopup('<b>About Water Meter 4</b></br> '  +  '</br> Status :  Online'+'<br>Positive Cumulative Flow: '+ dataswm4.PositiveCumulativeFlow + '<br>Pre Units: m³' + '<br> As of: '+ dataswm4.CommunicationTime).openPopup();
                                    console.log('success');
                                    map.spin(false);
                                },
                                error: function (error) {
                                    Smartwatermeter4.bindPopup('Error fetching data' ).openPopup().addTo(map);
                                    console.error('Error fetching data:', error);
                                    map.spin(false);
                                }
                                });
                            }
                        // Open popup and fetch data when marker is clicked
                        Smartwatermeter4.on('click', function () {
                            updatePopupsm4();
                        });
                        //----------------------endrequestdatajquery--------------------------

   
                        
                        
                        //grouplayers-------------------------------------------------------
                        var basebaseLayers = {
                            "OpenStreetMap": tiles,
                            "OpenStreetMap.HOT": osmHOT,
                            "world_topo": world_topo,
                            // "openTopoMap" : openTopoMap,
                            "world_imagry" : world_imagry
                                
                            };

                        var overlays = {
                            "Pressure Sensor": Pressuresensor,
                            "Pressure Sensor 2": Pressuresensor2,
                            "Pressure Sensor 3": Pressuresensor3,
                            "Pressure Sensor 4": Pressuresensor4
                            
                            
                        };
                        //kml file----------------------------------------------
                        var customLayer = L.geoJson(null, {
                            // http://leafletjs.com/reference.html#geojson-style
                            style: function(feature) {
                                return { color: '#696969' ,weight: '1' ,stroke: 'true', fillOpacity:'0' };
                            }
                        });
                        var customLayer2 = L.geoJson(null, {
                            // http://leafletjs.com/reference.html#geojson-style
                            style: function(feature) {
                                return { color: 'black' ,weight: '1' ,stroke: 'true', fillOpacity:'0' };
                            }
                        });

                        var customLayer3 = L.geoJson(null, {
                            // http://leafletjs.com/reference.html#geojson-style
                            style: function(feature) {
                                return { color: 'red' ,weight: '1' ,stroke: 'true', fillOpacity:'0' };
                            }
                        });
                        var customLayer4 = L.geoJson(null, {
                            // http://leafletjs.com/reference.html#geojson-style
                            style: function(feature) {
                                return { color: 'blue' ,weight: '1' ,stroke: 'true', fillOpacity:'0' };
                            }
                        });
                        var customLayer5 = L.geoJson(null, {
                            style: function(feature) {
                                return { color: 'green', weight: '1', stroke: 'true', fillOpacity: '1' };
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.name) {
                                    // Create a permanent tooltip for each feature
                                    layer.bindTooltip(feature.properties.name, {
                                        permanent: true,  // Make the tooltip always visible
                                        direction: 'center', // Center the tooltip on the feature
                                        className: 'feature-label' // Custom CSS class for styling
                                    }).openTooltip();
                                }
                            }
                        });
                        // maplayers kml--------------------------------------








                        // const Buildingkml = omnivore.kml('assets/kml/pssm/Building.kml', null, customLayer);
                        //buildings---------------------------------
                        const Buildingkml = omnivore.kml('assets/kml/pssm/Building.kml').addTo(map);


                        const isabelakml = omnivore.kml('assets/kml/pssm/Isabela.kml', null, customLayer);

                        const  cauayankml = omnivore.kml('assets/kml/pssm/CauayanCityBoundary.kml', null, customLayer2);
                        
                        const  cabaruanboundary  = omnivore.kml('assets/kml/othermaps/cabaruan boundary.kml', null ,customLayer3).addTo(map);

                        const  CatchmentArea  = omnivore.kml('assets/kml/othermaps/CatchmentArea.kml', null ,customLayer4).addTo(map);

                        const  SWHF  = omnivore.kml('assets/kml/othermaps/SWHF.kml', null ,customLayer5).addTo(map);




                        

                        //---------------------------------------------------
                        //flytomarklocation when clicking the mark event----------
                        Pressuresensor.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        });   

                        Pressuresensor2.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        });  
                        Pressuresensor3.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        }); 
                        Pressuresensor4.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        });  
                        //---------------------------------------------------
                        //flytomarklocationsmart watermeter when clicking the mark event------------------------
                        Smartwatermeter.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        });   
                        Smartwatermeter2.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        });  
                        Smartwatermeter3.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        }); 
                        Smartwatermeter4.on('click', function(e) {
                            map.flyTo(e.latlng, 17);      
                        });   

                        //---------------------------------------------------


                        //search box leaflet---------------------------------------
                        
                        var searchControl = new L.esri.Controls.Geosearch().addTo(map);

                        var results = new L.LayerGroup(swmg).addTo(map);


                        searchControl.on('results', function(data){
                            results.clearLayers();
                           
                            for (var i = data.results.length - 1; i >= 0; i--) {
                                results.addLayer(L.marker(data.results[i].latlng).bindPopup(data.results[i].text+' <br> '+data.results[i].latlng).openPopup());

                                // console.log(data.results[i].text);

                            }

                        });

                        
                        //v2-----------
                            




                       



                        //---------------------------------------------------------------------------------------------------------
                        //controllayers-----------------------------------
                        // var layerControl = L.control.layers(basebaseLayers,overlays,{ collapsed: false}).addTo(map);
                        
    


                        // Overlay layers
                        // var overlayLayers = {
                        //     "KML Layer": kmlLayer
                        // };

                        var baseTree = {
                            label: 'Base Layers',
                            children: [
                                {
                                    label: 'World &#x1f5fa;',
                                    children: [
                                        { label: 'OpenStreetMap', layer: tiles },
                                        { label: 'OpenStreetMap.HOT', layer: osmHOT },
                                        { label: 'World Imagery', layer: world_imagry },
                                        { label: 'World Topo', layer: world_topo },
                                        // { label: 'openTopoMap', layer: openTopoMap },
                                        // { label: 'World Imagery', layer: world_imagry },
                                        /* ... */
                                    ]
                                },
                            ]
                            };
                            var sensors= {
                                label: 'Sensors',
                                selectAllCheckbox: false,
                        
                                children: [
                                    {
                                        label: 'Pressure Sensors',
                                        collapsed: true,
                                        selectAllCheckbox: false,
                                        children: [
                                            { label: 'PS 1', layer: Pressuresensor },
                                            { label: 'PS 2', layer: Pressuresensor2 },
                                            { label: 'PS 3', layer: Pressuresensor3 },
                                            { label: 'PS 4', layer: Pressuresensor4 },
                                            /* ... */
                                        ]
                                    },
                                    {
                                        label: 'Smart Water Meter',
                                        collapsed: true,
                                        selectAllCheckbox: false,
                                        children: [
                                            { label: 'SWM 1', layer: Smartwatermeter },
                                            { label: 'SWM 2', layer: Smartwatermeter2 },
                                            { label: 'SWM 3', layer: Smartwatermeter3 },
                                            { label: 'SWM 4', layer: Smartwatermeter4 },
                                            /* ... */
                                        ]
                                    },
                                ]
                            };
                            var otherlayers= {
                                // label: 'Other Layers',
                                // selectAllCheckbox: false,
                                label: 'Other Layers',
                                collapsed: true,
                                selectAllCheckbox: false,
                                children: [
                                    { label: 'Buildings CCC Bus station', layer: Buildingkml},
                                    { label: 'Isabela Boundary', layer: isabelakml},
                                    { label: 'Cauayan Boundary', layer: cauayankml},
                                    { label: 'Cabaruan Boundary', layer: cabaruanboundary},
                                    { label: 'Catchment Area', layer: CatchmentArea},
                                    { label: 'Storm Water Harvesting Facility', layer: SWHF},
                                    
                                    
                                    /* ... */
                                ]
                
                                
                            };


                        //     var kmlLayer = L.layerGroup();
                        //     var loadingIndicator = document.getElementById('loadingIndicator');

                        //     loadingIndicator.style.display = 'block';
                        //     fetch('assets/kml/fhm/fh5yr.kml')
                        //     .then(response => response.text())
                        //     .then(kmlData => {
                        //         var layerss = omnivore.kml.parse(kmlData);
                        //         kmlLayer.clearLayers();
                        //         // overlayLayers = {label:  "KML Layer",layer: layerss };
                        //         kmlLayer.addLayer(layerss);
                        //         // map.fitBounds(layerss.getBounds());
                        //         loadingIndicator.style.display = 'none';
                        //     })
                        //     .catch(error => {console.error('Error loading KML file:', error);
                        //     loadingIndicator.style.display = 'none';
                        // });

                        //     var overlayLayers ={
                        //         label: 'Flood Hazard Map',
                        //         children: [{
                        //             id: '5yrr',
                        //             label: 'KML Layer',
                        //             layer: kmlLayer
                        //         }]

                        //     };










                            var layerControl = L.control.layers.tree(baseTree,[sensors,otherlayers],{
                                namedToggle: true,
                                collapsed: false,
                            }).addTo(map);














                            // checkbox eventlistener------------
                            document.addEventListener('change', function(event) {
                                var checkbox = event.target;
                                if (checkbox.type === 'checkbox' && checkbox.checked) {
                                    // console.log('Checkbox checked:', checkbox.id  ); // Log the name of the checked checkbox
                                }
                            });


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
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/guestlayout.blade.php ENDPATH**/ ?>