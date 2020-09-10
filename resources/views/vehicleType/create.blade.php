@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('vehicleType.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Layout</label>
                        <input type="text" name="layout" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Total Seat</label>
                        <input type="text" name="seat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Facility ID</label>
                        <input type="text" name="facility_id" class="form-control" required>
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
