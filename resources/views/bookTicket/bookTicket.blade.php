@extends('layouts.layout')
@section('content')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:white;height:80px">
     <div class="container">
       <div class="navbar-header">
          <a class="navbar-brand" href="/"><img src="{{asset('images/jhunLogo.png')}}" height="50" width="100"></a>
           <h2>@foreach($routes as $r)<option value="{{$r->id}}">{{$r->start_point}} -- {{$r->end_point}}</option>@endforeach</h2>
           <h2>Departure:{{$date2}}</h2>
       </div>
       <div id="navbar" class="collapse navbar-collapse">

       </div><!--/.nav-collapse -->
     </div>
   </nav>

    <form action="/tickets" method="POST" id="form" class="mx-5">
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

        <div class="card p-2" id="availableTickets" style="margin-top:100px">
            <div id="radioOption"></div>
            <div id="seatModal" class="modal fade" role="dialog">
             <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Select Seat</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="exit exit--back fuselage ml-4" id="exit" style="display:none"></div>
                        <div class="window window--back ml-4" id="window" style="display:none"></div>
                        <div class="form-check ml-5" id="vehicleLayout"></div>
                        <div class="exit exit--back fuselage ml-4" id="exit1" style="display:none"></div>
                        <div class="mb-5" style="display: none;" id="vehicleLayoutsHidden">
                            <div id="all"></div>
                            <div id="new"></div>
                        </div>
                         <div class="form-group mt-5 ml-4" id="bookBtn" style="display:none">
                            <div class="row">
                                 <div class="col-md-5">
                                     <label for="" style="font-size:12px">Passenger Name</label>
                                     <input style="height:25px"  type="text" class="form-control form-control-sm" name="name"  id="name" required>
                                     <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                                 </div>
                                 <div class="col-md-5">
                                     <label for="" style="font-size:12px">Phone Number</label>
                                     <input style="height:25px" type="text" class="form-control form-control-sm" name="phoneNumber"  id="phoneNumber" required>
                                     <font style="color:red"> {{ $errors->has('phoneNumber') ?  $errors->first('phoneNumber') : '' }} </font>
                                 </div>
                                 <div class="col-md-2" style="margin-top:26px;">
                                     <span class="bg" id="addMore">Add</span>
                                 </div>
                              </div>
                              <table class="table table-sm table-bordered" style="display: none;">
                                  <thead>
                                      <tr>
                                          <th style="font-size:12px">Passenger Name</th>
                                          <th style="font-size:12px">Phone Number</th>
                                          <th style="font-size:12px">Action</th>
                                      </tr>
                                  </thead>

                                  <tbody id="addRow" class="addRow">

                                  </tbody>


                                  </table>
                            <input type="submit" value="Book" class="btn btn-primary">
                        </div>
                     </div>
                  </div>
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
                    $('#radioOption').append("<div class='outer radiodiv' style='color:black;border:1px solid grey'><i class='fa fa-bus big-icon'></i><div class='content'> "+ "<span class='bg animated fadeInDown'>" + '@foreach($vehicleType as $v)<option value="{{$v->id}}">{{$v->name}}</option>@endforeach' + "</span>" + ' ' + "<a href='#'>" + "RS." + message.price + "</a>" +
                    "<table>"+"<thead>"+"<tr>"+"<th>"+"<h6>" + "Vehicle Name" + "</h6>" + "</th>" + "<th>"+"<h6>" + "Available Seats" + "</h6>" + "</th>" + "<th>"+"<h6>" + "Departure Time" + "</h6>" + "</th>" + "<th>"+"<h6>" + "Arrival Time" + "</h6>" + "</th>" + "</tr>" + "</thead>" + "<tbody>"+"<tr>"+"<td>"+ message.vehicle.name + ' ' +message.vehicle.reg_number + "</td>" + "<td>" + message.available_seats  + "</td>" + "<td>" + message.time + "</td>" + "<td>" + message.arrival_time + "</td>" +"</tbody>" +
                    "<div class='button'> <a href='#' onclick=selected(this)><input class='form-check-input' data-toggle='modal' data-target='#seatModal' type='radio' name='trip' required value='" + message.id + "' onclick='displayAllocatedSeats("+ message.row +","+ message.column +",[" + message.allocated_seats+ "])'>VIEW SEATS</a></div></div></div>");
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
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">

      <td>
        <input type="text" name="name[]" value="@{{ name }}" style="width:120px;height:25px" required>
      </td>
      <td>
        <input type="text" name="phoneNumber[]" value="@{{ phoneNumber }}" style="width:120px;height:25px" required>
      </td>

      <td>
       <span class="removeaddmore bg" style="cursor:pointer;color:white;background:darkred">Remove</span>
      </td>

  </tr>
 </script>

<script type="text/javascript">

 $(document).on('click','#addMore',function(){

     $('.table').show();

     var name = $("#name").val();
     var phoneNumber = $("#phoneNumber").val();
     var source = $("#document-template").html();
     var template = Handlebars.compile(source);

     var data = {
        name: name,
        phoneNumber: phoneNumber
     }

     var html = template(data);
     $("#addRow").append(html)

     total_ammount_price();
 });

  $(document).on('click','.removeaddmore',function(event){
    $(this).closest('.delete_add_more_item').remove();
    total_ammount_price();
  });


</script>


@endsection










