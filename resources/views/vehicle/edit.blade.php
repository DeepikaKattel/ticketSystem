@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('vehicle.update',$vehicle->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Reg. No</label>
                        <input type="text" name="reg_number" class="form-control" value="{{$vehicle->reg_number}}" required>
                    </div>

                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$vehicle->name}}" required>
                       </div>

                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <select class="form-control" id="vehicleType" name="vehicleType" required >
                            @foreach($vehicleType as $vehicle)
                                <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>
                    <div class="form-group">
                        <label>Engine No.</label>
                        <input type="text" name="engine" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Chassis</label>
                        <input type="text" name="chassis" class="form-control"  required>
                    </div>

                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Owner Name</label>
                        <input type="text" name="owner_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Owner Number</label>
                        <input type="text" name="owner_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" required>
                    </div>

                    <div class="form-group float-right">
                        <button class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
