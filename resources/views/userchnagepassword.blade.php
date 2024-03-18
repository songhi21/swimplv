@extends('layouts.admin')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            {{-- breadcrump --}}
                <h3 class="page-title"> Change Password</h3>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="#">Change Password</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                        @include('account.userchangepassword')
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


@endsection
