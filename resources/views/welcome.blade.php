<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>SWIMP3CentralHub</title>
        <!-- <link rel="stylesheet" href="../css/style.css" /> -->
        {{-- <link href="{{ config('variable.url') }}css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="{{ config('variable.url') }}css/style.css" rel="stylesheet">
        <link href="{{ config('variable.url') }}css/font.css" rel="stylesheet">
        {{-- <link href="{{ config('variable.url') }}css/core.css" rel="stylesheet"> --}}


        <!-- Styles -->

    </head>
    <body class="antialiased">
        <!-- <div id="app">
            <example-component></example-component>
        </div>
        <script src="{{asset('js/app.js')}}" ></script> -->
        <!-- partial:index.partial.html -->
        <div class="container" onclick="onclick">
          <div class="top"></div>
          <div class="bottom"></div>
          <div class="center">
            <img src="{{ config('variable.url') }}image/p3.png" style="width: 40%"/>
              <h2>SWIM Project 3 Central Hub</h2>
              <input type="email" placeholder="Email"/>
              <input type="password" placeholder="Password"/>
              {{-- <h2>&nbsp;</h2> --}}
              <button type="button" class="btn-success">Sign In</button>
              {{-- <button type="button" class="btn btn-primary">Primary</button>
              <button type="button" class="btn btn-primary">Primary</button> --}}
          </div>
        </div>
        <!-- partial -->
        <script src="{{ asset('js/prefixfree.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>


</html>
    
</html>
