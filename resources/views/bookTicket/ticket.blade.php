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


        <table class="table">
            <thead class="thead-dark">
                <tr style="font-size: 10px">
                    <th>Id</th>
                    <th>Vehicle</th>
                    <th>Route</th>
                    <th>User</th>
                    <th>Number of Passenger</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->trip->vehicleType->name}}</td>
                        <td>{{$ticket->trip->route->start_point}} - {{$ticket->trip->route->end_point}}</td>
                        <td>{{$ticket->user->name}}</td>
                        <td>{{$ticket->no_of_passenger}}</td>
                        <td>{{$ticket->amount}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                {!!$tickets->links()!!}
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
