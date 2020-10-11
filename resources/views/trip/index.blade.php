@extends('adminPanel.master')
@section('rightContent')
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <div class="container-fluid">
        <div class="row justify-content-center ml-5">
            <div class="col-xs-20 col-md-15 col-lg-12 mx-5">
            <h1>Trip</h1>
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
            <a href="{{route('trip.create')}}" class="btn btn-info float-right" style="margin-bottom: 10px">Add Trip</a>
            <table class="table">
                <thead class="thead-dark">
                <tr style="font-size: 14px">
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Departure Time</th>
                     <th scope="col">Arrival Time</th>
                     <th scope="col">Pickup</th>
                     <th scope="col">Drop</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Route</th>
                    <th scope="col">Price</th>
                    <th scope="col">Availabe seats</th>
                    <th scope="col">Status</th>
                    <th scope="col" id="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trip as $t)
                    <tr style="font-size: 13px">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$t->title}}</td>
                        <td>{{$t->departure_date}}</td>
                        <td>{{$t->time}}</td>
                        <td>{{$t->arrival_time}}</td>
                        <td>{{$t->pickUp}}</td>
                        <td>{{$t->dropUp}}</td>
                        <td>{{$t->vehicle->reg_number}}-{{$t->vehicle->name}}-{{$t->vehicle->vehicleType->name}}</td>
                        <td>{{$t->route->name}}</td>
                        <td>{{$t->price}}</td>
                        <td>{{$t->available_seats}}</td>
                        <td id="none">@if($t->status==0) <span style="color:red;font-weight: bold">Inactive</span> @else <span style="color:green;font-weight: bold">Active</span> @endif</td>
                        <td id="none"><a href="{{route('statust', ['id'=>$t->id])}}" style="font-weight: bold">@if($t->status==1)<button class="btn-sm btn-primary btn-danger"> Inactive </button>@else<button class="btn-sm btn-primary btn-success"> Active </button>@endif</a>
                            <a href="{{route('trip.edit',$t->id)}}"><i class="fa fa-lg fa-edit"></i></a>
                            @method('DELETE')
                            <a onclick="return confirm('Do you want to delete')" href="{{route('t.destroy',$t->id)}}"><i class="fa fa-lg fa-minus-circle" style="color:red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {!!$trip->links()!!}
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

