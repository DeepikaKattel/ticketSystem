@extends('adminPanel.master')
@section('rightContent')
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <div class="container-fluid">
        <div class="row justify-content-center ml-5">
            <div class="col-xs-20 col-md-15 col-lg-12 mx-5">
            <h1>Vehicle Type</h1>
                <form>
                    <label>Show</label>
                    <select id="pagination">
                        <option selected>---</option>
                        <option value="http://127.0.0.1:8000/setLimit/5" >5</option>
                        <option value="http://127.0.0.1:8000/setLimit/10" >10</option>
                        <option value="http://127.0.0.1:8000/setLimit/all" >All</option>
                    </select>
                    <label>entries</label>
                </form>
            <a href="{{route('vehicleType.create')}}" class="btn btn-info float-right" style="margin-bottom: 10px">Add Vehicle Type</a>
            <table class="table">
                <thead class="thead-dark">
                <tr style="font-size: 14px">
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Layout</th>
                    <th scope="col">Total Seat</th>
                    <th scope="col">Facility ID</th>
                    <th scope="col">Status</th>
                    <th scope="col" id="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicleType as $v)
                    <tr style="font-size: 14px">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->layout}}</td>
                        <td>{{$v->seat}}</td>
                        <td>{{$v->facility_id}}</td>
                        <td id="none">@if($v->status==0) <span style="color:red;font-weight: bold">Inactive</span> @else <span style="color:green;font-weight: bold">Active</span> @endif</td>
                        <td id="none"><a href="{{route('status', ['id'=>$v->id])}}" style="font-weight: bold">@if($v->status==1)<button class="btn-sm btn-primary btn-danger"> Inactive </button>@else<button class="btn-sm btn-primary btn-success"> Active </button>@endif</a></td>
                        <td id="none">
                            <a href="{{route('vehicleType.edit',$v->id)}}"><button class="btn-sm btn-primary">Edit</button></a>
                            @method('DELETE')
                            <a onclick="return confirm('Do you want to delete')" href="{{route('v.destroy',$v->id)}}"><button class="btn-sm btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {!!$vehicleType->links()!!}
            </div>
        </div>
    </div>
    <script>
        $(function(){
            // bind change event to select
            $('#pagination').on('change', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>
@endsection

