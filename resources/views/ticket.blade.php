<!DOCTYPE html>
<html lang="">
<head>

</head>
<body>
    <h1 class="text-center">Auto Bus Sewa Ticket</h1>
    <img src="{{asset('images/jhunLogo.png')}}" height="50" width="100">

    <p class="row">
        <hr style="margin-top: 10px;">
            <table class="table" style="display: inline-block;">
                <thead class="thead-dark">
                <tr style="font-size: 14px">
                    <th scope="col">Passenger Name</th>
                </tr>
                </thead>
                <tbody>
                 @foreach(json_decode($ticket->name) as $n)
                  <tr style="font-size: 13px">
                     <td>{{$n}}</td>
                  </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table" style="display: inline-block;">
                <thead class="thead-dark">
                <tr style="font-size: 14px">
                    <th scope="col">Phone Number</th>
                </tr>
                </thead>
                <tbody>
                 @foreach(json_decode($ticket->phoneNumber) as $p)
                  <tr style="font-size: 13px">
                     <td>{{$p}}</td>
                  </tr>
                @endforeach
                </tbody>
            </table>
         <p>Number of Passengers: {{$ticket->no_of_passenger}}</p>
         <p>Your total ticket price is <b>{{$ticket->amount}}.</b></p>
    </div>
    </body>
</html>
