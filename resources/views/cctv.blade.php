@extends('layouts.admin')
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            {{-- breadcrump --}}
              <h3 class="page-title"> Software </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
                  <li class="breadcrumb-item active" aria-current="page">Software</li>
                </ol>
              </nav>
        </div>
            {{-- breadcrump --}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Download Easy VMS Desktop Software</h4>
                    <p>This generic VMS software can help you to manage your IP cameras and DVRs, just click the link below to download it for Free.</p>
                    <p>version: EasyVMS_v3.0.0.9450_RC20211112</p>
                    <a class="btn btn-success" href="https://drive.google.com/file/d/1UPeazpugnWbJ6xlovhawoofPUcSWReKs/view?usp=sharing" target="_blank">Click here to download</a>
                    <br>
                    <br>
                    <B>Download & Installation</B>
                    <p>1) Click here to download the Easy VMS Software.<br>
                        2) Extract the Zip File . Enter the Password: 1234. <br>
                        3) Double-click the downloaded EasyVMS_v3.0.0.9450_RC20211112.exe to start the installation.</p>
                    <br>
                    <h4 class="card-title">Download P6SLite on Android Devices</h4>
                    <p>P6SLite is a video transmission software based on P2P technology, which supports multiple types of devices such as IPC/NVR/DVR. The main functions include device management, video preview, video playback, etc. download it for Free.</p>
                    <a class="btn btn-success" href="https://play.google.com/store/apps/details?id=com.zwcode.p6slite&hl=en&gl=US" target="_blank">Click here to download P6slite on appstore</a>
                    <br>
                    <br>
                    <B>Download & Installation</B>
                    <p>1) Click here to download the Easy VMS Software.<br>
                        2) Double-click the Install button to start the installation.</p>
                </div>
            </div>
        </div>
@endsection
