@extends('adminPanel.master')
@section('rightContent')
    @can('admin_access')
        <div class="row justify-content-center ml-5">
            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-user fa-lg" style="color: green"></i><h4><a href="{{ url('/') }}/staffDetails">Staff {{$staffCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-users fa-lg" style="color: blue"></i><h4><a href="{{ url('/') }}/customerDetails">Customer {{$customerCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-car fa-lg" style="color: red"></i><h4><a href="{{ url('/') }}/customerVehicles"> Registered Vehicles {{$vehicles ?? ''}}</a></h4>

                    </div>
                </div>
            </div>
        </div>
    @endcan
    @can('staff_access')
        <div class="row justify-content-center ml-5">
            <div class="col-xs-12 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-file fa-lg" style="color: green"></i><h2 style="color: #1b4b72;font-weight: bold;font-family: Arial">Upcoming Appointments  {{$data ?? ''}} </h2>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @can('customer_access')
        <div class="row justify-content-center ml-5">
            <div class="col-xs-12 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-file fa-lg" style="color: green"></i><h2 style="color: #1b4b72;font-weight: bold;font-family: Arial">Total Appointments {{$data ?? ''}} </h2>
                        <button class="btn btn-primary" style="background: darkred;display:inline-block;font-size: 10px;"><a href="{{route('getReport')}}" style="color: white">View Service Report</a></button>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
