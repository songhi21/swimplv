<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head class="border-red">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SwimProject3') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navhomepage.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="css/loadingcss.css" rel="stylesheet">
    <link href="css/btnnavchangecss.css" rel="stylesheet">
    <link href="css/cssbuttoncustom.css" rel="stylesheet">
    <link href="css/floatbtnemail.css" rel="stylesheet">
    
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
                                <a   role="button" class="{{ Request::segment(1) == 'maps' ? 'bn632-hover bn26' : null}} nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:black!important">Data</a>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ config('variable.url') }}maps" style="letter-spacing: 2px!important">Sensors</a></li>
                                    <li><a class="dropdown-item" href="{{ config('variable.url') }}mapsoutput" style="letter-spacing: 2px!important">Maps</a></li>
                                </ul>
                              </li>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ config('variable.url') }}login">Login</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        @yield('content')
        {{-- <div class="container-scroller "> --}}
            


            
            {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script> --}}
            {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.6.0/proj4.js"></script> --}}
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/loadingjs.js"></script>
        </div>
    </body>
</html>
