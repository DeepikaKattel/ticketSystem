@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('route.update',$route->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Start Point</label>
                        <select class="form-control" id="start_point" name="start_point" required >
                            @foreach($destination as $dest)
                                <option value="{{$dest->name}}">{{$dest->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>
                    <div class="form-group">
                        <label>End Point</label>
                        <select class="form-control" id="end_point" name="end_point" required >
                            @foreach($destination as $dest)
                                <option value="{{$dest->name}}">{{$dest->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>



                    <div class="form-group">
                        <label>Stoppage Points</label>
                        <select class="form-control" id="stoppage_points" name="stoppage_points[]" required multiple="multiple">
                            @foreach($destination as $dest)
                                <option value="{{$dest->name}}">{{$dest->name}}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow"></span>
                    </div>
                    <div class="form-group">
                        <label>Distance Travel</label>
                        <input type="text" name="distance" class="form-control" value="{{$route->distance}}" required>
                    </div>
                    <div class="form-group">
                        <label>Children Seat</label>
                        <input type="text" name="child_seat" class="form-control" value="{{$route->child_seat}}" required>
                    </div>

                    <div class="form-group">
                        <label>Special Seat</label>
                        <input type="text" name="special_seat" class="form-control" value="{{$route->special_seat}}" required>
                    </div>


                    <div class="form-group float-right">
                        <button class="btn btn-primary float-left">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
