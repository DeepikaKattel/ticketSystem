@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('staff.update',$staff->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$staff->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="position" class="form-control" value="{{$staff->position}}" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control" value="{{$staff->phoneNumber}}" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{$staff->address}}" required>
                    </div>

                    <div class="form-group float-right">
                        <button class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
