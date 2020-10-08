@extends('layouts.layout')
@section('content')
<style>
* {
	box-sizing: border-box;
}

.outer {
	position: relative;
	background: #fff;
	height: 350px;
	width: 100%;
	overflow: hidden;
	display: flex;
	align-items: center;
	border-radius:20px;
}

img {
	position: absolute;
	top: 0px;
	right: -20px;
	z-index: 0;
	animation-delay: 0.5s;
}

.content {
	animation-delay: 0.3s;
	position: absolute;
	left: 20px;
	z-index: 3

}

h1 {
	color: #111;
}

p {
	width: 280px;
	font-size: 13px;
	line-height: 1.4;
	color: #aaa;
	margin: 20px 0;

}

.bg {
	display: inline-block;
	color: #fff;
	background: cornflowerblue;
	padding: 5px 10px;
	border-radius: 50px;
	font-size: .7em;
}
.button {
	width: fit-content;
	height: fit-content;
	margin-top: 10px;



}

.button a {
	display: inline-block;
	overflow: hidden;
	position: relative;
	font-size: 11px;
	color: #111;
	text-decoration: none;
	padding: 10px 15px;
	border: 1px solid #aaa;
	font-weight: bold;


}

.button a:after{
	content: "";
	position: absolute;
	top: 0;
	right: -10px;
	width: 0%;
	background: #111;
	height: 100%;
	z-index: -1;
	transition: width 0.3s ease-in-out;
	transform: skew(-25deg);
	transform-origin: right;
}

.button a:hover:after {
	width: 150%;
	left: -10px;
	transform-origin: left;

}

.button a:hover {
	color: #fff;
	transition: all 0.5s ease;
}


.button a:nth-of-type(1) {
	border-radius: 50px 0 0 50px;
	border-right: none;
}

.button a:nth-of-type(2) {
	border-radius: 0px 50px 50px 0;
}

.cart-icon {
	padding-right: 8px;

}

.footer {
	position: absolute;
	bottom: 0;
	right: 0;
}
</style>
    <h2>Seat Selection</h2>
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

             	{{--<div class="outer">
             		<div class="content animated fadeInLeft">
             			<span class="bg animated fadeInDown">EXCLUSIVE</span>
             			<h1>Afro<br/> baseball hair</h1>
             			<p>Shadow your real allegiance to New York</p>

             			<div class="button">
             				<a href="#">$115</a><a class="cart-btn" href="#"><i class="cart-icon ion-bag"></i>ADD TO CART</a>
             			</div>

             		</div>
             		<img src="{{asset('images/').'/'.$destination}}" width="350px" height="200px" class="animated fadeInRight">
             	</div>--}}



        </div>


        <div class="form-group card pr-3" id="availableTickets" style="border-radius:20px">
            <label for="radioOption" ><h3 class="card-header pl-4 mt-2" style="color:black;margin-left:20px;border-top-left-radius:20px;border-top-right-radius:20px;border:solid 2px black">Available Buses:</h3></label>

            <div class="form-check mb-2" id="radioOption"></div>

            <div class="exit exit--back fuselage ml-4" id="exit" style="display:none"></div>
            <div class="window window--back ml-4" id="window" style="display:none"></div>
            <div class="form-check ml-4" id="vehicleLayout"></div>
            <div class="exit exit--back fuselage ml-4" id="exit1" style="display:none"></div>
            <div class="mb-5" style="display: none;" id="vehicleLayoutsHidden">]
                <div id="all"></div>
                <div id="new"></div>
            </div>
             <div class="form-group mt-5 ml-4">
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
            $('#hideButton').show();
             emptyLayout();
            if (data.listTickets.length == 0) {
                $('#noTickets').show();
            }else{
                data.listTickets.forEach(function(message){
                    $('#radioOption').append("<div class='card pl-3 pr-3 pb-3 pt-2 radiodiv mb-2' onclick=selected(this) style='color:black;border:2px solid black;'><input class='form-check-input' id='' type='radio' name='trip' required value='" + message.id + "' onclick='displayAllocatedSeats("+ message.row +","+ message.column +",[" + message.allocated_seats+ "])'> "+ "<table>" + "<thead>"+ "<tr>"+ "<th>"+ "<h5 style='display:inline;clear:none'>" + "Vehicle" + "</h5>" + "</th>" + "<th>" + "<h5 style='display: inline;clear:none'>" + " Available Seats:" + "</h5>" + "</th>" +  "<th>" + "<h5 style='display: inline;clear:none'>" + "Departure Time:" + "</h5>" + "</th>" + "</tr>" + "</thead>" + "<tbody>" + "<tr>" + "<p>" + "<td>" + message.vehicle.name + ' ' + message.vehicle.reg_number +"</p>" + "</td>" + "<p>" + "<td>" + message.available_seats + "</p>" + "</td>" +  "<p>" + "<td>" + message.time + "</p>" + "</td>" +"</tr>" + "</tbody>" + "</table>" + "<br><div>");
                });
                $('#availableTickets').show();
                $('#hideButton').hide();
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










