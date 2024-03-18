@extends('layouts.admin')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
      <div class="page-header">
          {{-- breadcrump --}}
            <h3 class="page-title"> Accounts </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">User Account /</li>
              </ol>
            </nav>
      </div>
      {{-- breadcrump --}}
      @include('errortrapping.errortrap')
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage User account</h4>
                <p class="card-description"> Create, remove and update User account.
                </p>
                <div class="row">
                    <div class="col-lg-6 " >
                        <form action="{{ route('searchuser') }}" method="get">
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
                            <a href="{{ route('useraccount.index') }}" type="button" class="btn btn-outline-secondary">
                                <i class="mdi mdi-reload d-block mb-1"></i> Clear Result </a>
                        @else
                            
                        @endif
                    </div>
                    <div class="col-lg-6 textright" >
                        <a type="button" class="btn btn-outline-success btn-fw" href="{{ config('variable.url') }}register">
                            + Create New
                        </a>
                    </div>
                </div>
                {{-- tablecontent --}}
            </div>
          </div>   
        </div>
      </div>
      <div >
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">List of Account</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      {{-- <th> --}}
                        {{-- <div class="form-check form-check-muted m-0">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                          </label>
                        </div> --}}
                      {{-- </th> --}}
                      <th> User Name </th>
                      <th> Email </th>
                      <th> Created </th>
                      <th> Updated </th>
                      <th> Type </th>
                      <th> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($result)): ?>
                        <?php foreach($result as $index=> $data):?>
                                <?php 
                                    $id = $data['id'];
                                    $name = $data['name'];
                                    $type = $data['type'];
                                    $email = $data['email'];
                                    $updatedated = $data['updated'];
                                    $created = $data['created'];
                                ?>
                                  <tr>
                                        {{-- <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                        </td> --}}
                                        <td>
                                            {{-- <img src="assets/images/faces/face1.jpg" alt="image"> --}}
                                            <span class="pl-2">{{ $name }}</span>
                                        </td>
                                        <td> {{$email}} </td>
                                        <td> {{$created}} </td>
                                        <td> {{$updatedated}} </td>
                                        <td> {{$type}} </td>
                                        <td>
                                              <button type="button" data-toggle="modal" data-target="#edit<?php echo $id ?>" class="btn btn-outline-info btn-icon-text">
                                                <i class="mdi mdi-pen"></i>
                                              </button>
                                              <button type="button" data-toggle="modal" data-target="#changepassword<?php echo $id ?>" class="btn btn-outline-success btn-icon-text">
                                                <i class="mdi mdi-key"></i>
                                              </button>
                                              <button type="button" data-toggle="modal" data-target="#delete<?php echo $id ?>" class="btn btn-outline-danger btn-icon-text">
                                                <i class="mdi mdi-delete"></i>
                                              </button>

                                        </td>
                                        @include('account.changepassword')
                                        @include('account.deletewsh')
                                        @include('account.modaleditwsh')   
                                  </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12 col-xl-12">
              <div class="row">
                      <div class="row text-center">
                          <div class="col-lg-12 col-xl-12 text-center">
                              
                              <div class="text-center3 ">
                                  @if(isset($_GET['searchinput']))

                                      {{ $User->appends(['searchinput' => $_GET['searchinput']])->links('pagination::bootstrap-4') }}
                                  @else
                                      {{ $User->fragment('tab')->links('pagination::bootstrap-4') }}
                                  @endif
                              </div>
                              <p> {{ "Showing ".$User->CurrentPage() ." to ".$User->lastPage() ." of ". count($User) . " entries ". " about ".$User->total()  }}</p>
                          </div>
                      </div>

              </div>

          </div>
      </div>
  </div>
@endsection
