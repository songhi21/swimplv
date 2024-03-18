@extends('layouts.admin')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            {{-- breadcrump --}}
              <h3 class="page-title"> Data Gathered </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
                  <li class="breadcrumb-item active" aria-current="page">CCTV footage</li>
                </ol>
              </nav>
        </div>
        @include('errortrapping.errortrap')
        {{-- @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {!! session()->get('success') !!}
            </div>
        @endif --}}

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Table Links</h4>
                        <p class="card-description"> CCTV Footage.
                        </p>
                        <div class="row">
                            <div class="col-lg-6 " >
                                <form action="{{ route('searchcctv') }}" method="get">
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
                                    <a href="{{ route('cctvview.index') }}" type="button" class="btn btn-outline-secondary">
                                        <i class="mdi mdi-reload d-block mb-1"></i> Clear Result </a>
                                @else
                                    
                                @endif
                               
                            </div>
                            @if(Auth::check())
                                @if(Auth::user()->type == "Admin")
                                    <div class="col-lg-6 textright" >
                                        <button type="button" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal">
                                            + Create New
                                    </div>
                                    @extends('cctvviewmodal.createmodal')
                                    <div class="col-lg-12 card-body" >
                                        <br>
                                        <h4 class="card-title">Notice</h4>
                                        <p class="card-description"> Make sure you copy the embedded video Url and enable the sharable link.</p>
                                    </div>
                                @endif
                            @endif
                            

                        </div>
                        {{-- tablecontent --}}
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
                                        @include('cctvviewmodal.cardtable')
                                        <br>
                                </div>
                                
                            <?php endforeach; ?>
                           
                        <?php else: ?>
                        <?php endif; ?>
                        
                    </div>

                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12 col-xl-12 text-center">
                    
                    <div class="text-center3 ">
                        @if(isset($_GET['searchinput']))

                            {{ $cctvview->appends(['searchinput' => $_GET['searchinput']])->links('pagination::bootstrap-4') }}
                        @else
                            {{ $cctvview->fragment('tab')->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                    <p> {{ "Showing ".$cctvview->CurrentPage() ." to ".$cctvview->lastPage() ." of ". count($cctvview) . " entries ". " about ".$cctvview->total()  }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
