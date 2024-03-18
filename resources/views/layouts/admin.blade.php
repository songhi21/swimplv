<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ config('variable.url') }}css/core.css" rel="stylesheet">
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
    {{-- @vite(['resources/css/firstletter.css', 'resources/js/firstletter.js']) --}}
    <link href="assets/css/firstletter.css" rel="stylesheet"/>
    {{-- <link href="css/loadingcss.css" rel="stylesheet"> --}}



</head>
<body class="antialiased">
    {{-- <div id="loading-overlay">
        <div id="loading-spinner"></div>
    </div> --}}
    <div class="container-scroller ">
        {{-- navigation --}}
        @include('layouts.sidenav')
        @include('layouts.topnavigation')
        
        {{-- content --}}
        @yield('content')
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

{{-- <script src="js/loadingjs.js"></script> --}}

</body>
</html>
