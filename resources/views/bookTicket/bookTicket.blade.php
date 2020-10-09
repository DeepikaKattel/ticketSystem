@extends('layouts.layout')
@section('content')


    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:white;height:80px">
     <div class="container">
       <div class="navbar-header">
          <a class="navbar-brand" href="/"><img src="{{asset('images/jhunLogo.png')}}" height="50" width="100"></a>
           <h2>@foreach($routes as $r)<option value="{{$r->id}}">{{$r->start_point}} --> {{$r->end_point}}</option>@endforeach</h2>
           <h2>Departure:{{$date2}}</h2>
       </div>
       <div id="navbar" class="collapse navbar-collapse">

       </div><!--/.nav-collapse -->
     </div>
   </nav>

    <form action="/tickets" method="POST" class="mx-5">
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
                {{--<label for="fleet">Vehicle Type</label>--}}
                <select class="form-control" id="vehicleType" name="vehicleType" hidden>
                    @foreach($vehicleType as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
                <span class="select-arrow"></span>
            </div>


            <div class="col-md-3">
                {{--<label for="booking_date">Booking Date: </label><br>--}}
                <input style="height:55px;font-weight:bolder;padding:10px;border:solid 2px" type="date" id="booking_date" name="booking_date" value="{{$date2}}"required hidden>
             </div>

        </div>


        <div class="card p-2" id="availableTickets">
            <div class="mb-2" id="radioOption" style="margin-top:10px;box-shadow:2px 2px black"></div>
            <div class="exit exit--back fuselage ml-4" id="exit" style="display:none"></div>
            <div class="window window--back ml-4" id="window" style="display:none"></div>
            <div class="form-check ml-4" id="vehicleLayout"></div>
            <div class="exit exit--back fuselage ml-4" id="exit1" style="display:none"></div>
            <div class="mb-5" style="display: none;" id="vehicleLayoutsHidden">
                <div id="all"></div>
                <div id="new"></div>
            </div>
             <div class="form-group mt-5 ml-4" id="bookBtn" style="display:none">
                <input type="submit" value="Book" class="btn btn-primary">
            </div>
        </div>
    </form>
<script>
window.onload = function() {
   checkTicket();
}
</script>

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
            $('#availableTickets').show();

             emptyLayout();
            if (data.listTickets.length == 0) {
                $('#noTickets').show();
            }else{
                data.listTickets.forEach(function(message){
                    $('#radioOption').append("<div class='outer radiodiv' onclick=selected(this) style='color:black;border:1px solid grey;padding-top:10px'><div class='content animated fadeInLeft'><input class='form-check-input' id='' type='radio' name='trip' required value='" + message.id + "' onclick='displayAllocatedSeats("+ message.row +","+ message.column +",[" + message.allocated_seats+ "])'> "+ "<span class='bg animated fadeInDown'>" + '@foreach($vehicleType as $v)<option value="{{$v->id}}">{{$v->name}}</option>@endforeach' + "</span>" + "<br>"+
                    "<h3>" +  message.vehicle.name + ' ' + message.vehicle.reg_number + "</h3>" + "<p>" + " Available Seats:" +' '+ message.available_seats + "<br>" + "Departure Time:" +' '+ message.time + "</p>" +
                    "<div class='button'><a href='#'>" + "RS." + message.price + "</a><a class='cart-btn' href='#' ><i class='fa fa-seat'></i>VIEW SEATS</a></div></div><i class='fa fa-bus big-icon'></i></div>");
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
                $('#exit').show();
                $('#exit1').show();
                $('#window').show();
                $('#bookBtn').show();
                $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;' type='checkbox' value='"+index+"'>");
                $('#all').append("<input type='checkbox' name='all_allocated_seats[]' value='0' checked>");
            } else {
                $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;background:#b33319' type='checkbox' data-title='Seat Already Booked' disabled>");
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
    item.style.backgroundColor = '#d9fce3';
}

function clear() {
    for(var i=0; i < divItems.length; i++) {
        var item = divItems[i];
        item.style.backgroundColor = '';
    }
}

</script>
@endsection










