@extends('layouts.admin')
@extends('wshmodal.create')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
{{-- <div class="row">
    <div id="app">
        <example-component></example-component>
    </div>
</div> --}}
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            {{-- breadcrump --}}
                <h3 class="page-title"> Water Sensor Hub</h3>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="{{ config('variable.url') }}hub">Tables</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Water Sensor Hub</li>
                </ol>
                </nav>
        </div>
            {{-- breadcrump --}}
        @include('errortrapping.errortrap')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Table Links</h4>
                        <p class="card-description"> Manage Water Sensor.
                        </p>
                        <div class="row">
                            <div class="col-lg-6 " >
                                <form action="{{ route('searching') }}" method="get">
                                    @method("PUT")
                                    @csrf
                                    <div class="input-group">
                                        <input name="searchinput" type="text" class="form-control" placeholder="Search.." value="{{ isset($_GET['searchinput']) ? $_GET['searchinput'] : '' }}" id="searchinput">
                                        <div class="input-group-prepend">
                                            @if(isset($_GET['searchinput']))
                                                {{-- <button onchange="myFunction()"> X </button> --}}
                                                
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                @if(isset($_GET['searchinput']))
                                    <a href="{{ route('hub.index') }}" type="button" class="btn btn-outline-secondary">
                                        <i class="mdi mdi-reload d-block mb-1"></i> Clear Result </a>
                                @else
                                    
                                @endif
                                
                            </div>
                            @if(Auth::check())
                                @if(Auth::user()->type == "Admin")
                                    <div class="col-lg-6 textright" >
                                        <button type="button" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal">
                                            + Create New
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </div>
                        {{-- tablecontent --}}
                        <br>
                        <br>
                    </div>
                </div>
               
            </div>
        </div>
        <div >
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="row">
                        <?php if(isset($result)): ?>
                            <?php foreach($result as $index=> $data):?>
                                    <?php 
                                        $id = $data['id'];
                                        $name = $data['name'];
                                        $linkage = $data['links'];
                                        $updatedated = $data['updated'];
                                        $created = $data['created'];
                                    ?>

                                    <div class="col-lg-4">
                                        @include('wshmodal.cardtable')
                                        <br>
                                </div>
                                
                            <?php endforeach; ?>
                           
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12 col-xl-12 text-center">
                            
                            <div class="text-center3 ">
                                @if(isset($_GET['searchinput']))

                                    {{ $hub->appends(['searchinput' => $_GET['searchinput']])->links('pagination::bootstrap-4') }}
                                @else
                                    {{ $hub->fragment('tab')->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                            <p> {{ "Showing ".$hub->CurrentPage() ." to ".$hub->lastPage() ." of ". count($hub) . " entries ". " about ".$hub->total()  }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
