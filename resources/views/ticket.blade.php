<!DOCTYPE html>
<html lang="">
<head>

</head>
<body>
    <h1 class="text-center">JhunJHun Ticket</h1>

    <p class="row">
        <hr style="margin-top: 10px;">
        <h2>{{$userDetails->firstName}} {{$userDetails->lastName}}</h2>
        <p>Number of Passengers: {{$ticket->no_of_passenger}}</p>
        <p>Your total ticket price is <b>{{$ticket->amount}}.</b></p>
    </div>
    </body>
</html>