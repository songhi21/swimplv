@extends('../layouts.pslayoutshow')
<input type="hidden" id="hiddenId" value="{{ $id }}">
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            {{-- breadcrump --}}
                <h3 class="page-title"> Pressure Sensor - Device Management</h3>

        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div id="idps"></div>
                                <div id="devicename"></div>
                                <div id="networktype"></div>
                                {{-- <div id="Devicetype"></div> --}}
                                <div id="status"></div>
                                <div id="receiveTime"></div>
                                <div id="currentValue"></div>
                                <div id="rssi"></div>
                                <div id="power"></div>
                                
                            </div>
                            <div class="col-lg-6 col-xl-6  text-right">
                                {{-- datahere --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
        </div>
        
        <div >
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class='card' style="color: white!important">
                        <div class='card-body col-lg-12 col-xl-12'>
                            <button type="button" class="btn btn-success text-right" id="exportExcel">Export to Excel</button>
{{--                             
                            <table class="table tablebg  display nowrap " id="result" style="width: 100%!important">
                                <thead >
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>DeviceId</th>
                                        <th>NetworkType</th>
                                        <th>Equipmenttype</th>
                                        <th>Onlinestatus</th>
                                        <th>Updatetime</th>
                                        <th>Measurements</th>
                                        <th>SignalStrength</th>
                                        <th>BatteryVoltage</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection