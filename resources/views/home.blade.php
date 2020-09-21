@extends('adminPanel.master')
@section('rightContent')
    @can('admin_access')
        <div class="row justify-content-center ml-5">
            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-user fa-lg" style="color: green"></i><h4><a href=" {{ route('staff.index') }}">Total Staff {{$staffCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-users fa-lg" style="color: blue"></i><h4><a href="{{ route('agent.index') }}">Total Agents {{$agentCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-users fa-lg" style="color: red"></i><h4>Total Customers {{$customerCount?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ml-5 mt-5" >
            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-ticket fa-lg" style="color: green"></i><h4><a href=" {{ route('bookTicket.index') }}">Total Tickets Booked {{$bookCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-car fa-lg" style="color: red"></i><h4><a href=" {{ route('vehicle.index') }}">Total Vehicles {{$vehicleCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-cab fa-lg" style="color: blue"></i><h4><a href=" {{ route('vehicleType.index') }}">Total Vehicle Types {{$vehicleTypeCount ?? ''}}</a></h4>
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
                        <i class="fa fa-users fa-lg" style="color: red"></i><h4>Total Tickets Booked {{$bookCount?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('agent_access')
        <div class="row justify-content-center ml-5">
            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-user fa-lg" style="color: green"></i><h4><a href=" {{ route('staff.index') }}">Total Staff {{$staffCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-users fa-lg" style="color: red"></i><h4>Total Customers {{$customerCount?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ml-5 mt-5" >
            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-ticket fa-lg" style="color: green"></i><h4><a href=" {{ route('bookTicket.index') }}">Total Tickets Booked {{$bookCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-car fa-lg" style="color: red"></i><h4><a href=" {{ route('vehicle.index') }}">Total Vehicles {{$vehicleCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-cab fa-lg" style="color: blue"></i><h4><a href=" {{ route('vehicleType.index') }}">Total Vehicle Types {{$vehicleTypeCount ?? ''}}</a></h4>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
