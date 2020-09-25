@extends('layouts.layout')
@section('content')

    <h2>Booking Form</h2>

    <form action="/tickets" method="POST">
        @csrf

        <div class="form-group">
            <label for="route">Route:</label>
            <select class="form-control mr-sm-2" id="route" name="route">
                @foreach($routes as $r)
                    <option value="{{$r->id}}">{{$r->start_point}} - {{$r->end_point}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fleet">Vehicle Type</label>
            <select class="form-control mr-sm-2" id="vehicleType" name="vehicleType">
                <option>------</option>
                @foreach($vehicleType as $v)
                    <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="booking_date">Booking Date: </label><br>
            <input type="date" id="bookingDate" name="booking_date" required>
        </div>


        <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="checkTicket()">Check for ticket</button>
            <span class="pl-2" id="noTickets" style="display:none;">
                No tickets available
            </span>
        </div>

        <div class="form-group" id="availableTickets" style="display:none;">
            <label for="radioOption">Available Tickets:</label>
            <div class="form-check mb-2" id="radioOption"></div>

            <div class="mb-5" style="display: none;" id="vehicleLayoutsHidden">
            <label for="radioOption">Choose YourSeat:</label>
            <div class="exit exit--back fuselage"></div>
            <div class="window window--back"></div>
            <div class="form-check" id="vehicleLayout"></div>
            <div class="exit exit--back fuselage"></div>
            <div id="all"></div><div id="new"></div></div>

            <div class="form-group mt-5">
                <input type="submit" value="Book" class="btn btn-primary">
            </div>
        </div>
    </form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script defer>
function checkTicket() {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'}
    });
    var formData = {
        'bookingDate' : $('#bookingDate').val(),
        'route' : $('#route').val(),
        'vehicleType' : $('#vehicleType').val()
    };
    $.ajax({
        type: 'POST',
        url: '/tickets/check',
        data: formData,
        dataType: 'json',
        success: function(data){
            $('#radioOption').html("");
            $('#noTickets').hide();
            $('#availableTickets').hide();
            emptyLayout();
            if (data.listTickets.length == 0) {
                $('#noTickets').show();
            }else{
                data.listTickets.forEach(function(message){
                    $('#radioOption').append("<input class='form-check-input' id='' type='radio' name='trip' required value='" + message.id + "' onclick='displayAllocatedSeats("+ message.row +","+ message.column +",[" + message.allocated_seats+ "])'> " + message.available_seats + " seats available for " +  message.vehicle.name + message.vehicle.reg_number + "<br>");
                });
                $('#availableTickets').show();
            }
        },
        error: function (data) {
            console.log("Error from the server");
            $('#noTickets').show();
        }
    });
}

function displayAllocatedSeats(row, col, list){
    emptyLayout();
    index = 0
    var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
    for (let i = 0; i < row; i++) {
        for (let j = 0; j < col; j++) {
            if (list[index] == 0) {
                $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;' type='checkbox' value='"+index+"'>");
                $('#all').append("<input type='checkbox' name='all_allocated_seats[]' value='0' checked>");
            } else {
                $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;' type='checkbox' disabled>");
                $('#all').append("<input type='checkbox' name='all_allocated_seats[]' value='1' checked>")
            }
            $('#new').append("<input type='checkbox' name='new_allocated_seats[]' value='0' checked>");

            index++;
        }
        $('#vehicleLayout').append('<br>');
    }
}

function emptyLayout() {
    $("#all").empty();
    $("#new").empty();
    $('#vehicleLayout').empty();
}

$(document).ready(function(){
    $(document).on('click', '.seat', function(){
        place = $(this).val();
        newAllocatedSeats = $('#new').children()[place];
        allAllocatedSeats = $('#all').children()[place];
        if ($(this).is(":checked")){
            $(newAllocatedSeats).attr('value', 1);
            $(allAllocatedSeats).attr('value', 1);
            console.log(allAllocatedSeats);
            console.log(newAllocatedSeats);
        }
        else {
            $(newAllocatedSeats).attr('value', 0);
            $(allAllocatedSeats).attr('value', 1);
            console.log(allAllocatedSeats);
            console.log(newAllocatedSeats);
        }
    });
});
</script>
@endsection










