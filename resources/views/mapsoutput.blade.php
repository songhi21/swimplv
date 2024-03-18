@extends('layouts.mapsoutputlayout')



@section('content')
    <div class="boxwrap">
        <div class="container centered">Maps Output</div>
    </div>
    @include('mapsoutput.content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-body-secondary">&copy;  SWIM. All rights reserved.</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="image/p3.png" width="80" height="60" alt="" >
            <span style="font-weight: bold; color:rgb(17, 17, 17);font-family: Lucida Handwriting;">Swim Project 3 </span>
          </a>
      
          <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="{{ config('variable.url') }}/" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="{{ config('variable.url') }}about" class="nav-link px-2 text-body-secondary">About</a></li>
            <li class="nav-item"><a href="{{ config('variable.url') }}maps" class="nav-link px-2 text-body-secondary">Data</a></li>
            <li class="nav-item"><a href="{{ config('variable.url') }}login" class="nav-link px-2 text-body-secondary">Login</a></li>
          </ul>
        </footer>
      </div>

@endsection