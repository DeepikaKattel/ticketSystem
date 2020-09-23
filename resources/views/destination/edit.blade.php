@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form action="{{route('destination.update',$destination->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$destination->name}}" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{$destination->description}}" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{$destination->image}}" required>
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
