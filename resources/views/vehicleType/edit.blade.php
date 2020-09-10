@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('vehicleType.update',$vehicleType->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$vehicleType->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>Layout</label>
                        <input type="text" name="layout" class="form-control" value="{{$vehicleType->layout}}"required>
                    </div>
                    <div class="form-group">
                        <label>Total Seat</label>
                        <input type="text" name="seat" class="form-control" value="{{$vehicleType->seat}}" required>
                    </div>

                    <div class="form-group">
                        <label>Facility ID</label>
                        <input type="text" name="facility_id" class="form-control" value="{{$vehicleType->seat}}" required>
                    </div>


                    <div class="form-group float-right">
                        <button class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
