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
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Route</th>
                    <th scope="col">User</th>
                    <th scope="col">No. of Passengers</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>

                    <th scope="col" id="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr style="font-size: 10px">
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->trip->vehicleType->name}}</td>
                        <td>{{$ticket->trip->route->start_point}} - {{$ticket->trip->route->end_point}}</td>
                        <td>{{$ticket->user->name}}</td>
                        <td>{{$ticket->no_of_passenger}}</td>
                        <td>{{$ticket->amount}}</td>
                        <td id="none">@if($ticket->status==0) <span style="color:red;font-weight: bold">Unpaid</span> @else <span style="color:green;font-weight: bold">Paid</span> @endif</td>
                        <td id="none"><a href="{{route('statusb', ['id'=>$ticket->id])}}" style="font-weight: bold">@if($ticket->status==1)<button class="btn-sm btn-primary btn-danger" style="font-size: 10px"> Unpaid </button>@else<button class="btn-sm btn-primary btn-success" style="font-size: 10px"> Paid </button>@endif</a>
{{--                            <a href="{{route('bookTicket.edit',$ticket->id)}}"><button class="btn-sm btn-primary" style="font-size: 10px">Edit</button></a>--}}
                            @method('DELETE')
                            <a onclick="return confirm('Do you want to delete')" href="{{route('b.destroy',$ticket->id)}}"><i class="fa fa-lg fa-minus-circle" style="color:red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

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

