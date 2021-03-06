@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('price.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Route</label>
                        <select class="form-control" id="route" name="route" required >
                            @foreach($route as $r)
                                <option value="{{$r->name}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>

                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <select class="form-control" id="vehicleType" name="vehicleType" required >
                            @foreach($vehicleType as $vehicle)
                                <option value="{{$vehicle->name}}">{{$vehicle->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Children Price</label>
                        <input type="text" name="children_price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Special Price</label>
                        <input type="text" name="special_price" class="form-control" required>
                    </div>


                    <div class="form-group float-right" style="margin-left: 20px">
                        <input type="button" class="btn btn-primary float-left" value="Back" onclick="history.back()">
                    </div>

                    <div class="form-group float-right">
                        <button class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
