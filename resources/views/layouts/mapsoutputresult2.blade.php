<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head class="border-red">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SWIMP3') }}</title>
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/leaftlet.css" />
    <link rel="stylesheet" href="../css/L.Control.Layers.Tree.css" />
       <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="../js/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/esri-leaflet-geocoder.css">
    <script src="../js/esri-leaflet.js"></script>

    <script src="../js/esri-leaflet-geocoder.js"></script>
    <link href="../css/btnnavchangecss.css" rel="stylesheet">
    <link href="../css/maps.css" rel="stylesheet" >
    <link rel="stylesheet" href="../assets/qml/leaflet/css/L.Control.Locate.min.css">
    {{-- <link rel="stylesheet" href="../assets/qml/leaflet/css/qgis2web.css"> --}}
    {{-- <link rel="stylesheet" href="../assets/qml/leaflet/css/fontawesome-all.min.css"> --}}
    <style>
        /* CSS */
    .button-49,
    .button-49:after {
    width: 150px;
    height: 76px;
    line-height: 78px;
    font-size: 20px;
    font-family: 'Bebas Neue', sans-serif;
    background: linear-gradient(45deg, transparent 5%, #14c936 5%);
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
        {{-- <div id="loadingIndicator">Loading...</div> --}}
        {{-- content --}}
        <div id="loading-overlay">
            <div id="loading-spinner"></div>
        </div>
        
        <div class="container overlay">
            <br>
            <nav class="navbar navbar-expand-lg navbar-dark bgnav">
                <div class="container image_wrapper">
                    <a class="navbar-brand" href="{{ config('variable.url') }}/" style="font-weight:bold!important">
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
                            <a aria-current="page" href="{{ config('variable.url') }}/" class="{{ Request::segment(1) == '' ? 'bn632-hover bn26' : null}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ config('variable.url') }}../about"  class="{{ Request::segment(1) == 'about' ? 'bn632-hover bn26' : null}}">About</a>
                        </li>
                        <li >
                            <li class="nav-item dropdown">
                                <a   role="button" class="bn632-hover bn26 nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ config('variable.url') }}../maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="{{ config('variable.url') }}../mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>

                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ config('variable.url') }}../login">Login</a>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        @yield('content')
        <div class="container-scroller ">
            


            

            <script src="https:///ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../js/maps/L.KML.js"></script>
            <script src="../js/maps/spin.min.js" charset="utf-8"></script>
            <script src="../js/maps/leaflet.spin.min.js" charset="utf-8"></script>
            <script type="text/javascript" src="../js/L.Control.Layers.Tree.js"></script>
            <script src="../js/loadingjs.js"></script>
            
            <script type="text/javascript" src="../js/proj4.js"></script>
            

            <script type="text/javascript" src="../js/proj4leaflet.min.js"></script>

            <script type="text/javascript" src="../js/coord-projection.js"></script>
            {{-- <script src="https://unpkg.com/leaflet.kml"></script> --}}
            <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
            <script type="text/javascript" src="../assets/js/mapsoutput/result.js"></script>
            {{-- <script src="../assets/js/mapsoutput/shp.js"></script> --}}
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/shpjs/3.7.1/shapefile.js"></script> --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/shpjs/3.6.2/shp.min.js"></script>
            <script src="../js/maps/leaflet.shpfile.js"></script>
            <link href="../css/loadingcss.css" rel="stylesheet">
            
            <script src="../assets/qml/leaflet/js/qgis2web_expressions.js"></script>
            <script src="../assets/qml/leaflet/js/L.Control.Locate.min.js"></script>
            <script src="../assets/qml/leaflet/js/leaflet.rotatedMarker.js"></script>
            <script src="../assets/qml/leaflet/js/leaflet.pattern.js"></script>
            <script src="../assets/qml/leaflet/js/leaflet-hash.js"></script>
            <script src="../assets/qml/leaflet/js/Autolinker.min.js"></script>
            <script src="../assets/qml/leaflet/js/rbush.min.js"></script>
            <script src="../assets/qml/leaflet/js/labelgun.min.js"></script>
            <script src="../assets/qml/leaflet/js/labels.js"></script>
            {{-- mainlayer --}}
            <script src="../assets/qml/leaflet/data/Susceptability_5.js"></script>
            <script src="../assets/qml/leaflet/data/GroundShaking_0.js"></script>
            <script src="../assets/qml/leaflet/data/CityBoundary_1.js"></script>
            {{-- mainlayer --}}
            <script src="../assets/qml/leaflet/data/BarangayBoundary_6.js"></script>
            <script src="../assets/qml/leaflet/data/ExistingWaterDrainage_7.js"></script>
            <script src="../assets/qml/leaflet/data/FloodControl_8.js"></script>
            <script src="../assets/qml/leaflet/data/MainCanal_9.js"></script>
            <script src="../assets/qml/leaflet/data/LateralCanal_10.js"></script>
            <script src="../assets/qml/leaflet/data/Creek_11.js"></script>
            <script src="../assets/qml/leaflet/data/Turnout_12.js"></script>
            <script src="../assets/qml/leaflet/data/ExistingWaterInfrastructure_13.js"></script>
            <script src="../assets/qml/leaflet/data/Cauayan_City_14.js"></script>
            




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

                        const map = L.map('map2', {
                            center: [16.9, 121.8],
                            zoom: 11,
                            zoomControl: true,
                            layers: [world_imagry]
                        });
                        //----maplayer end----------------------------------
                        

   
                        
                        
                        //grouplayers-------------------------------------------------------
                        var basebaseLayers = {
                            "OpenStreetMap": tiles,
                            "OpenStreetMap.HOT": osmHOT,
                            "world_topo": world_topo,
                            // "openTopoMap" : openTopoMap,
                            "world_imagry" : world_imagry
                                
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
                        // maplayers kml--------------------------------------








                        // const Buildingkml = omnivore.kml('assets/kml/pssm/Building.kml', null, customLayer);
                        //buildings---------------------------------
                        const Buildingkml = omnivore.kml('../assets/kml/pssm/Building.kml');


                        const isabelakml = omnivore.kml('../assets/kml/pssm/Isabela.kml', null, customLayer);

                        const  cauayankml = omnivore.kml('../assets/kml/pssm/CauayanCityBoundary.kml', null, customLayer2).addTo(map);
                        // const  fiveyr = omnivore.kml('../assets/kml/fhm/fh5yr.kml', null, customLayer2);
                        var id = $('#hiddenId').val();


                        // mapsoverlay-----------------------------

                        var highlightLayer;
                            function highlightFeature(e) {
                                highlightLayer = e.target;

                                if (e.target.feature.geometry.type === 'LineString') {
                                highlightLayer.setStyle({
                                    color: '#ffff00',
                                });
                                } else {
                                highlightLayer.setStyle({
                                    fillColor: '#ffff00',
                                    fillOpacity: 1
                                });
                                }
                            }
                            var crs = new L.Proj.CRS('EPSG:32651', '+proj=utm +zone=51 +datum=WGS84 +units=m +no_defs', {
                                resolutions: [2800, 1400, 700, 350, 175, 84, 42, 21, 11.2, 5.6, 2.8, 1.4, 0.7, 0.35, 0.14, 0.07],
                            });

                            var bounds_group = new L.featureGroup([]);
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        // mapsif-----------------------------------------
                        if(id == 'LiquefactionHazardMap'){


                            //     function setBounds() {
                            // }
                            function pop_Susceptability_5(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }

                            function style_Susceptability_5_0(feature) {
                                switch(String(feature.properties['Level'])) {
                                    case 'High':
                                        return {
                                    pane: 'pane_Susceptability_5',
                                    opacity: 1,
                                    color: 'rgba(35,35,35,0.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 1.0, 
                                    fill: true,
                                    fillOpacity: 0.5,
                                    fillColor: 'rgba(163,144,207,1.0)',
                                    interactive: true,
                                }
                                        break;
                                    case 'Low':
                                        return {
                                    pane: 'pane_Susceptability_5',
                                    opacity: 1,
                                    color: 'rgba(35,35,35,0.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 1.0, 
                                    fill: true,
                                    fillOpacity: 0.5,
                                    fillColor: 'rgba(214,237,193,1.0)',
                                    interactive: true,
                                }
                                        break;
                                    case 'Moderate':
                                        return {
                                    pane: 'pane_Susceptability_5',
                                    opacity: 1,
                                    color: 'rgba(35,35,35,0.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 1.0, 
                                    fill: true,
                                    fillOpacity: 0.5,
                                    fillColor: 'rgba(143,187,217,1.0)',
                                    interactive: true,
                                }
                                        break;
                                }
                            }

                            map.createPane('pane_Susceptability_5');
                            map.getPane('pane_Susceptability_5').style.zIndex = 405;
                            map.getPane('pane_Susceptability_5').style['mix-blend-mode'] = 'normal';
                            var layer_Susceptability_5 = new L.geoJson(json_Susceptability_5, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_Susceptability_5',
                                layerName: 'layer_Susceptability_5',
                                pane: 'pane_Susceptability_5',
                                onEachFeature: pop_Susceptability_5,
                                style: style_Susceptability_5_0,
                            });
                            bounds_group.addLayer(layer_Susceptability_5);
                            map.addLayer(layer_Susceptability_5);
                            function pop_BarangayBoundary_6(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }

                            var layersvalueid = { label: 'Susceptability<br /><table><tr><td style="text-align: center;"><img src="../assets/qml/leaflet/legend/Susceptability_5_High0.png" /></td><td>High</td></tr><tr><td style="text-align: center;"><img src="../assets/qml/leaflet/legend/Susceptability_5_Low1.png" /></td><td>Low</td></tr><tr><td style="text-align: center;"><img src="../assets/qml/leaflet/legend/Susceptability_5_Moderate2.png" /></td><td>Moderate</td></tr></table>', layer: layer_Susceptability_5 };
                            var extralayer = '';

                        }
                        else if(id == 'GroundShakingHazardMap'){

                            // groundshaking---------
                            function pop_GroundShaking_0(feature, layer) {
                            }

                            function style_GroundShaking_0_0() {
                                return {
                                    pane: 'pane_GroundShaking_0',
                                    opacity: 1,
                                    color: 'rgba(35,35,35,1.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 1.0, 
                                    fill: true,
                                    fillOpacity: 0.5,
                                    fillColor: 'rgba(152,125,183,1.0)',
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_GroundShaking_0');
                            map.getPane('pane_GroundShaking_0').style.zIndex = 400;
                            map.getPane('pane_GroundShaking_0').style['mix-blend-mode'] = 'normal';
                            var layer_GroundShaking_0 = new L.geoJson(json_GroundShaking_0, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_GroundShaking_0',
                                layerName: 'layer_GroundShaking_0',
                                pane: 'pane_GroundShaking_0',
                                onEachFeature: pop_GroundShaking_0,
                                style: style_GroundShaking_0_0,
                            });
                            bounds_group.addLayer(layer_GroundShaking_0);
                            map.addLayer(layer_GroundShaking_0);
                            function pop_CityBoundary_1(feature, layer) {
                            }

                            // citybound--------------
                            function style_CityBoundary_1_0() {
                                return {
                                    pane: 'pane_CityBoundary_1',
                                    opacity: 1,
                                    color: 'rgba(35,35,35,1.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 3.0, 
                                    fill: true,
                                    fillOpacity: 0.5,
                                    fillColor: 'rgba(133,182,111,0.0)',
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_CityBoundary_1');
                            map.getPane('pane_CityBoundary_1').style.zIndex = 401;
                            map.getPane('pane_CityBoundary_1').style['mix-blend-mode'] = 'normal';
                            var layer_CityBoundary_1 = new L.geoJson(json_CityBoundary_1, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_CityBoundary_1',
                                layerName: 'layer_CityBoundary_1',
                                pane: 'pane_CityBoundary_1',
                                onEachFeature: pop_CityBoundary_1,
                                style: style_CityBoundary_1_0,
                            });
                            bounds_group.addLayer(layer_CityBoundary_1);
                            map.addLayer(layer_CityBoundary_1);












                            var layersvalueid = { label: '<img src="../assets/qml/leaflet/legend/GroundShaking_0.png" /> Ground Shaking', layer: layer_GroundShaking_0 };
                            var extralayer = { label: '<img src="../assets/qml/leaflet/legend/CityBoundary_1.png" /> City Boundary', layer: layer_CityBoundary_1 };
                        

                        }
                        // otherlayersstuff-----------------------------------
                        function style_BarangayBoundary_6_0() {
                                return {
                                    pane: 'pane_BarangayBoundary_6',
                                    opacity: 1,
                                    color: 'rgba(35,35,35,1.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 1.0, 
                                    fill: true,
                                    fillOpacity: 1,
                                    fillColor: 'rgba(141,90,153,0.0)',
                                    interactive: true,
                                }
                            }

                            map.createPane('pane_BarangayBoundary_6');
                            map.getPane('pane_BarangayBoundary_6').style.zIndex = 406;
                            map.getPane('pane_BarangayBoundary_6').style['mix-blend-mode'] = 'normal';
                            var layer_BarangayBoundary_6 = new L.geoJson(json_BarangayBoundary_6, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_BarangayBoundary_6',
                                layerName: 'layer_BarangayBoundary_6',
                                pane: 'pane_BarangayBoundary_6',
                                onEachFeature: pop_BarangayBoundary_6,
                                style: style_BarangayBoundary_6_0,
                            });
                            bounds_group.addLayer(layer_BarangayBoundary_6);
                            map.addLayer(layer_BarangayBoundary_6);
                            function pop_ExistingWaterDrainage_7(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }
                        

                            function style_ExistingWaterDrainage_7_0() {
                                return {
                                    pane: 'pane_ExistingWaterDrainage_7',
                                    opacity: 1,
                                    color: 'rgba(233,48,6,1.0)',
                                    dashArray: '',
                                    lineCap: 'square',
                                    lineJoin: 'bevel',
                                    weight: 1.0,
                                    fillOpacity: 0,
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_ExistingWaterDrainage_7');
                            map.getPane('pane_ExistingWaterDrainage_7').style.zIndex = 407;
                            map.getPane('pane_ExistingWaterDrainage_7').style['mix-blend-mode'] = 'normal';
                            var layer_ExistingWaterDrainage_7 = new L.geoJson(json_ExistingWaterDrainage_7, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_ExistingWaterDrainage_7',
                                layerName: 'layer_ExistingWaterDrainage_7',
                                pane: 'pane_ExistingWaterDrainage_7',
                                onEachFeature: pop_ExistingWaterDrainage_7,
                                style: style_ExistingWaterDrainage_7_0,
                            });
                            bounds_group.addLayer(layer_ExistingWaterDrainage_7);
                            map.addLayer(layer_ExistingWaterDrainage_7);
                            function pop_FloodControl_8(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }


                            function style_FloodControl_8_0() {
                                return {
                                    pane: 'pane_FloodControl_8',
                                    opacity: 1,
                                    color: 'rgba(60,180,213,1.0)',
                                    dashArray: '',
                                    lineCap: 'square',
                                    lineJoin: 'bevel',
                                    weight: 3.0,
                                    fillOpacity: 0,
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_FloodControl_8');
                            map.getPane('pane_FloodControl_8').style.zIndex = 408;
                            map.getPane('pane_FloodControl_8').style['mix-blend-mode'] = 'normal';
                            var layer_FloodControl_8 = new L.geoJson(json_FloodControl_8, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_FloodControl_8',
                                layerName: 'layer_FloodControl_8',
                                pane: 'pane_FloodControl_8',
                                onEachFeature: pop_FloodControl_8,
                                style: style_FloodControl_8_0,
                            });
                            bounds_group.addLayer(layer_FloodControl_8);
                            map.addLayer(layer_FloodControl_8);
                            function pop_MainCanal_9(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }


                            

                            function style_MainCanal_9_0() {
                                return {
                                    pane: 'pane_MainCanal_9',
                                    opacity: 1,
                                    color: 'rgba(241,93,24,1.0)',
                                    dashArray: '',
                                    lineCap: 'square',
                                    lineJoin: 'bevel',
                                    weight: 3.0,
                                    fillOpacity: 0,
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_MainCanal_9');
                            map.getPane('pane_MainCanal_9').style.zIndex = 409;
                            map.getPane('pane_MainCanal_9').style['mix-blend-mode'] = 'normal';
                            var layer_MainCanal_9 = new L.geoJson(json_MainCanal_9, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_MainCanal_9',
                                layerName: 'layer_MainCanal_9',
                                pane: 'pane_MainCanal_9',
                                onEachFeature: pop_MainCanal_9,
                                style: style_MainCanal_9_0,
                            });
                            bounds_group.addLayer(layer_MainCanal_9);
                            map.addLayer(layer_MainCanal_9);
                            function pop_LateralCanal_10(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }



                            function style_LateralCanal_10_0() {
                                return {
                                    pane: 'pane_LateralCanal_10',
                                    opacity: 1,
                                    color: 'rgba(255,150,37,1.0)',
                                    dashArray: '',
                                    lineCap: 'square',
                                    lineJoin: 'bevel',
                                    weight: 2.0,
                                    fillOpacity: 0,
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_LateralCanal_10');
                            map.getPane('pane_LateralCanal_10').style.zIndex = 410;
                            map.getPane('pane_LateralCanal_10').style['mix-blend-mode'] = 'normal';
                            var layer_LateralCanal_10 = new L.geoJson(json_LateralCanal_10, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_LateralCanal_10',
                                layerName: 'layer_LateralCanal_10',
                                pane: 'pane_LateralCanal_10',
                                onEachFeature: pop_LateralCanal_10,
                                style: style_LateralCanal_10_0,
                            });
                            bounds_group.addLayer(layer_LateralCanal_10);
                            map.addLayer(layer_LateralCanal_10);
                            function pop_Creek_11(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }



                            function style_Creek_11_0() {
                                return {
                                    pane: 'pane_Creek_11',
                                    opacity: 1,
                                    color: 'rgba(79,133,207,1.0)',
                                    dashArray: '',
                                    lineCap: 'square',
                                    lineJoin: 'bevel',
                                    weight: 1.0,
                                    fillOpacity: 0,
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_Creek_11');
                            map.getPane('pane_Creek_11').style.zIndex = 411;
                            map.getPane('pane_Creek_11').style['mix-blend-mode'] = 'normal';
                            var layer_Creek_11 = new L.geoJson(json_Creek_11, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_Creek_11',
                                layerName: 'layer_Creek_11',
                                pane: 'pane_Creek_11',
                                onEachFeature: pop_Creek_11,
                                style: style_Creek_11_0,
                            });
                            bounds_group.addLayer(layer_Creek_11);
                            map.addLayer(layer_Creek_11);
                            function pop_Turnout_12(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }




                            function style_Turnout_12_0() {
                                return {
                                    pane: 'pane_Turnout_12',
                                    radius: 3.999999999999997,
                                    opacity: 1,
                                    color: 'rgba(255,255,255,1.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 2.0,
                                    fill: true,
                                    fillOpacity: 1,
                                    fillColor: 'rgba(133,248,121,1.0)',
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_Turnout_12');
                            map.getPane('pane_Turnout_12').style.zIndex = 412;
                            map.getPane('pane_Turnout_12').style['mix-blend-mode'] = 'normal';
                            var layer_Turnout_12 = new L.geoJson(json_Turnout_12, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_Turnout_12',
                                layerName: 'layer_Turnout_12',
                                pane: 'pane_Turnout_12',
                                onEachFeature: pop_Turnout_12,
                                pointToLayer: function (feature, latlng) {
                                    var context = {
                                        feature: feature,
                                        variables: {}
                                    };
                                    return L.circleMarker(latlng, style_Turnout_12_0(feature));
                                },
                            });
                            bounds_group.addLayer(layer_Turnout_12);
                            map.addLayer(layer_Turnout_12);
                            function pop_ExistingWaterInfrastructure_13(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }




                            function style_ExistingWaterInfrastructure_13_0() {
                                return {
                                    pane: 'pane_ExistingWaterInfrastructure_13',
                                    radius: 4.0,
                                    opacity: 1,
                                    color: 'rgba(255,255,255,1.0)',
                                    dashArray: '',
                                    lineCap: 'butt',
                                    lineJoin: 'miter',
                                    weight: 1,
                                    fill: true,
                                    fillOpacity: 1,
                                    fillColor: 'rgba(91,151,255,1.0)',
                                    interactive: true,
                                }
                            }
                            map.createPane('pane_ExistingWaterInfrastructure_13');
                            map.getPane('pane_ExistingWaterInfrastructure_13').style.zIndex = 413;
                            map.getPane('pane_ExistingWaterInfrastructure_13').style['mix-blend-mode'] = 'normal';
                            var layer_ExistingWaterInfrastructure_13 = new L.geoJson(json_ExistingWaterInfrastructure_13, {
                                attribution: '',
                                interactive: true,
                                dataVar: 'json_ExistingWaterInfrastructure_13',
                                layerName: 'layer_ExistingWaterInfrastructure_13',
                                pane: 'pane_ExistingWaterInfrastructure_13',
                                onEachFeature: pop_ExistingWaterInfrastructure_13,
                                pointToLayer: function (feature, latlng) {
                                    var context = {
                                        feature: feature,
                                        variables: {}
                                    };
                                    return L.circleMarker(latlng, style_ExistingWaterInfrastructure_13_0(feature));
                                },
                            });
                            bounds_group.addLayer(layer_ExistingWaterInfrastructure_13);
                            map.addLayer(layer_ExistingWaterInfrastructure_13);
                            function pop_Cauayan_City_14(feature, layer) {
                                layer.on({
                                    mouseout: function(e) {
                                        for (i in e.target._eventParents) {
                                            e.target._eventParents[i].resetStyle(e.target);
                                        }
                                    },
                                    mouseover: highlightFeature,
                                });
                            }
                            // var i = 0;
                            // layer_BarangayBoundary_6.eachLayer(function(layer) {
                            //     var context = {
                            //         feature: layer.feature,
                            //         variables: {}
                            //     };
                            //     layer.bindTooltip((layer.feature.properties['Brgy_Name'] !== null?String('<div style="color: #000000; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['Brgy_Name']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_BarangayBoundary_6'});
                            //     labels.push(layer);
                            //     totalMarkers += 1;
                            //     layer.added = true;
                            //     addLabel(layer, i);
                            //     i++;
                            // });





                            


                        

                        // endotherlayers---------------------------------------------


                        

                        //---------------------------------------------------
                        // var otherlayers= {
                        //         // label: 'Other Layers',
                        //         // selectAllCheckbox: false,
                        //         label: 'Other Layers',
                        //         collapsed: false,
                        //         selectAllCheckbox: false,
                        //         children: [
                        //             { label: 'Buildings CCC Bus station', layer: Buildingkml},
                        //             { label: 'Isabela Boundary', layer: isabelakml},
                        //             { label: 'Cauayan Boundary', layer: cauayankml},
                        //             /* ... */
                        //         ]
                
                                
                        //     };
                        
                        var baseMaps = {
                            label: 'Liquefaction Hazard Map',
                            collapsed: true,
                            selectAllCheckbox: false,
                            children: [
                                { label: '<img src="../assets/qml/leaflet/legend/ExistingWaterInfrastructure_13.png" /> Existing Water Infrastructure', layer: layer_ExistingWaterInfrastructure_13 },
                                { label: '<img src="../assets/qml/leaflet/legend/Turnout_12.png" /> Turnout', layer: layer_Turnout_12 },
                                { label: '<img src="../assets/qml/leaflet/legend/Creek_11.png" /> Creek', layer: layer_Creek_11 },
                                { label: '<img src="../assets/qml/leaflet/legend/LateralCanal_10.png" /> Lateral Canal', layer: layer_LateralCanal_10 },
                                { label: '<img src="../assets/qml/leaflet/legend/MainCanal_9.png" /> Main Canal', layer: layer_MainCanal_9 },
                                { label: '<img src="../assets/qml/leaflet/legend/FloodControl_8.png" /> Flood Control', layer: layer_FloodControl_8 },
                                { label: '<img src="../assets/qml/leaflet/legend/ExistingWaterDrainage_7.png" /> Existing Water Drainage', layer: layer_ExistingWaterDrainage_7 },
                                { label: '<img src="../assets/qml/leaflet/legend/BarangayBoundary_6.png" /> Barangay Boundary', layer: layer_BarangayBoundary_6 },
                                layersvalueid,
                                extralayer,
                                // { label: 'openTopoMap', layer: openTopoMap },
                                // { label: 'World Imagery', layer: world_imagry },
                                /* ... */
                            ]

                        
                        };

                        
                        
                        

                            var baseTree = {

                                collapsed: true,
                                selectAllCheckbox: false,
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
                                    /* ... */
                                ]
                
                                
                            };


                            var layerControl = L.control.layers.tree(baseTree,[baseMaps,otherlayers],{
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
            {{-- <script type="text/javascript" src="https://edihasaj.github.io/leaflet-coord-projection/coord-projection.js"></script> --}}
    
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
