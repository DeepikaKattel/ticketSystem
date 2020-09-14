@extends('adminPanel.master')
@section('rightContent')
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <div class="container-fluid">
        <div class="row justify-content-center ml-5">
            <div class="col-xs-20 col-md-15 col-lg-12 mx-5">
            <h1>Booked</h1>
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
{{--            <a href="{{route('bookTicket.create')}}" class="btn btn-info float-right" style="margin-bottom: 10px">Book Ticket</a>--}}
            <table class="table">
                <thead class="thead-dark">
                <tr style="font-size: 10px">
                    <th scope="col">S.N</th>
                    <th scope="col">Date</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Route</th>
                    <th scope="col">Seat</th>
                    <th scope="col">Adults</th>
                    <th scope="col">Children </th>
                    <th scope="col">Special </th>
                    <th scope="col">Price</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pickup </th>
                    <th scope="col">Drop </th>
                    <th scope="col">Status</th>

                    <th scope="col" id="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookTicket as $b)
                    <tr style="font-size: 10px">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$b->date}}</td>
                        <td>{{$b->vehicleType}}</td>
                        <td>{{$b->route}}</td>
                        <td>{{$b->seat}}</td>
                        <td>{{$b->passengers}}</td>
                        <td>{{$b->children}}</td>
                        <td>{{$b->special}}</td>
                        <td>{{$b->price}}</td>
                        <td>{{$b->email}}</td>
                        <td>{{$b->pickup}}</td>
                        <td>{{$b->drop}}</td>
                        <td id="none">@if($b->status==0) <span style="color:red;font-weight: bold">Unpaid</span> @else <span style="color:green;font-weight: bold">Paid</span> @endif</td>
                        <td id="none"><a href="{{route('statusb', ['id'=>$b->id])}}" style="font-weight: bold">@if($b->status==1)<button class="btn-sm btn-primary btn-danger" style="font-size: 10px"> Unpaid </button>@else<button class="btn-sm btn-primary btn-success" style="font-size: 10px"> Paid </button>@endif</a>
{{--                            <a href="{{route('bookTicket.edit',$b->id)}}"><button class="btn-sm btn-primary" style="font-size: 10px">Edit</button></a>--}}
                            @method('DELETE')
                            <a onclick="return confirm('Do you want to delete')" href="{{route('b.destroy',$b->id)}}"><button class="btn-sm btn-danger" style="font-size: 10px">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {!!$bookTicket->links()!!}
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

