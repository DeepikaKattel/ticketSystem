@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('trip.update',$trip->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{$trip->title}}" required>
                    </div>

                    <div class="form-group">
                        <label>Departure Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Departure Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <select class="form-control" id="vehicle" name="vehicle" required >
                            @foreach($vehicle as $v)
                                <option value="{{$v->id}}">{{$v->reg_number}}-{{$v->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>
                    <div class="form-group">
                        <label>Route</label>
                        <select class="form-control" id="route" name="route" required >
                            @foreach($route as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step=".01" name="price" class="form-control" value="{{$trip->price}}" required>
                    </div>

                    <div class="form-group float-right">
                        <button class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
