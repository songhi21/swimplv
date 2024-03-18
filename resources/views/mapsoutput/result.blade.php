@extends('layouts.mapsoutputresult')



@section('content')

<div id="map2" >


    <div id="popup" class="ol-popup">
        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
        <div id="popup-content"></div>
    </div>

</div>


<div class="navspaces2"></div>




<div class="container">
    <input type="hidden" id="hiddenId" value="{{ $id }}">
    <br>
    <br>
    <div id="arrayContainer">
        <!-- Array content will be displayed here -->
    </div>

</div>

@endsection