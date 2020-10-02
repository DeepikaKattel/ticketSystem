@extends('layouts.layout')
@section('content')

    <h2>Booking Form</h2>
    <form action="/tickets" method="POST">
        @csrf
        <div class="form-group">
            {{--<label for="route">Route:</label>--}}
            <select class="form-control mr-sm-2" id="route" name="route" hidden>
                @foreach($routes as $r)
                    <option value="{{$r->id}}">{{$r->start_point}} - {{$r->end_point}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <div class="col-md-5">
                <label for="fleet">Vehicle Type</label>
                <select style="height:55px;font-weight:bolder;padding:10px;border:solid 2px"  class="form-control" id="vehicleType" name="vehicleType" value={{old('vehicleType')}}>
                    @foreach($vehicleType as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
                <span class="select-arrow"></span>
            </div>


            <div class="col-md-3">
                <label for="booking_date">Booking Date: </label><br>
                <input style="height:55px;font-weight:bolder;padding:10px;border:solid 2px" type="date" id="booking_date" name="booking_date" value="{{$date2}}"required>
             </div>



            <div class="col-md-4">
                <button type="button" class="btn btn-primary mt-4" onclick="checkTicket()" style="height:60px;width:120px;padding:10px;border:solid 2px">Select Bus</button>
                <span class="pl-2" id="noTickets" style="display:none;">
                    Tickets not available. Please select another vehicle type.
                </span>
            </div>
        </div>

        <div class="form-group card pr-3" id="availableTickets" style="display:none;border-radius:20px">
            <label for="radioOption"><h3 class="card-header pl-4 mt-2" style="color:black;margin-left:20px;border-top-left-radius:20px;border-top-right-radius:20px;border:solid 2px black">Available Buses:</h3></label>
            <div class="form-check mb-2" id="radioOption"></div>


            {{--<div class="exit exit--back fuselage ml-4"></div>--}}
            <div class="window window--back ml-4"></div>
            <div class="form-check ml-4" id="vehicleLayout"></div>
            {{--<div class="exit exit--back fuselage ml-4"></div>--}}
            <div class="mb-5" style="display: none;" id="vehicleLayoutsHidden"><div id="all"></div><div id="new"></div></div>
            <div class="form-group mt-5 ml-4">
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
        'booking_date' : $('#booking_date').val(),
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
                    $('#radioOption').append("<div class='card pl-3 pr-3 pb-3 pt-2 radiodiv mb-2' onclick=selected(this) style='color:black;border:2px solid black;'><input class='form-check-input' id='' type='radio' name='trip' required value='" + message.id + "' onclick='displayAllocatedSeats("+ message.row +","+ message.column +",[" + message.allocated_seats+ "])'> "+ "<table>" + "<thead>"+ "<tr>"+ "<th>"+ "<h5 style='display:inline;clear:none'>" + "Vehicle" + "</h5>" + "</th>" + "<th>" + "<h5 style='display: inline;clear:none'>" + " Available Seats:" + "</h5>" + "</th>" +  "<th>" + "<h5 style='display: inline;clear:none'>" + "Departure Time:" + "</h5>" + "</th>" + "</tr>" + "</thead>" + "<tbody>" + "<tr>" + "<p>" + "<td>" + message.vehicle.name + ' ' + message.vehicle.reg_number +"</p>" + "</td>" + "<p>" + "<td>" + message.available_seats + "</p>" + "</td>" +  "<p>" + "<td>" + message.time + "</p>" + "</td>" +"</tr>" + "</tbody>" + "</table>" + "<br><div>");
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
                $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;background:#b33319' type='checkbox' disabled>");
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


var divItems = document.getElementsByClassName("radiodiv");

function selected(item) {
    this.clear();
    item.style.backgroundColor = '#e68d7a';
}

function clear() {
    for(var i=0; i < divItems.length; i++) {
        var item = divItems[i];
        item.style.backgroundColor = '';
    }
}

</script>
@endsection










