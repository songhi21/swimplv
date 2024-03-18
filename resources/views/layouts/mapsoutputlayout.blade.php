<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SWIMP3') }}</title>
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
       <!-- Make sure you put this AFTER Leaflet's CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <link rel="stylesheet" href="css/maps.css">
   <link href="css/mapsoutput.css" rel="stylesheet">
   {{-- <link href="css/cssbuttoncustom.css" rel="stylesheet"> --}}
   <link href="css/btnnavchangecss.css" rel="stylesheet">
   <link href="assets/css/datatable.min.css" rel="stylesheet">
   <link href="css/loadingcss.css" rel="stylesheet">
   <link href="assets/css/mapsoutputcss.css" rel="stylesheet">
   


</head>
    <body >
        <div id="loading-overlay">
            <div id="loading-spinner"></div>
        </div>
        {{-- content --}}
        
        <div class="container overlay">
            <br>
            <nav class="navbar navbar-expand-lg navbar-dark bgnav">
                <div class="container image_wrapper">
                    <a class="navbar-brand" href="{{ config('variable.url') }}/" style="font-weight:bold!important">
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
                            <a aria-current="page" href="{{ config('variable.url') }}/" class="{{ Request::segment(1) == '' ? 'bn632-hover bn26' : null}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ config('variable.url') }}about"  class="{{ Request::segment(1) == 'about' ? 'bn632-hover bn26' : null}}">About</a>
                        </li>
                        <li >
                            <li class="nav-item dropdown">
                                <a   role="button" class="{{ Request::segment(1) == 'mapsoutput' ? 'bn632-hover bn26' : null}} nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ config('variable.url') }}maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="{{ config('variable.url') }}mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>

                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ config('variable.url') }}login">Login</a>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        @yield('content')
        <div class="container-scroller ">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/loadingjs.js"></script>
            <script src="assets/js/datatablesjs/datatable.min.js"></script>
            <script src="assets/js/datatablesjs/setdatatable.js"></script>
            


        </div>
    </body>
</html>
