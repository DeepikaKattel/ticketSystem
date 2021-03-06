@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form id="bookingForm" action="{{route('bookTicket.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="destination">Vehicle Type</label>
                            <select class="form-control" id="vehicleType" name="vehicleType" required >
                                @foreach($vehicleType as $vehicle)
                                    <option value="{{$vehicle->name}}">{{$vehicle->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="destination">Route</label>
                            <select class="form-control" id="route" name="route" required >
                                @foreach($route as $r)
                                    <option value="{{$r->name}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="checkTicket()">Check for ticket</button>
                            <span class="pl-2" id="noTickets" style="display:none;">
                                 No tickets available
                            </span>
                        </div>
                    </div>
                    <div class="form-group" id="availableTickets" style="display:none;">
                        <div class="form-group col-md-6">
                            <label for="passengers">Number of Passengers</label>
                            <input type="text" name="passengers" class="form-control" required>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="children">Children Passengers</label>
                                <input type="text" name="children" class="form-control" required placeholder="Number of children">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="special">Special Passengers</label>
                                <input type="text" name="special" class="form-control" required placeholder="Number of special passengers">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-md-2 col-form-label">Select Seat:</label>
                            <div class="col-5 col-md-3">
                                <ol class="cabin">
                                    <li class="row row--1">
                                        <ol class="seats">
                                            <li class="seatStyle">
                                                <input type="checkbox" id="1A" />
                                                <label for="1A">1A</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="1B" />
                                                <label for="1B">1B</label>
                                            </li>

                                            <li class="seatStyle">
                                                <input type="checkbox" disabled id="1C" />
                                                <label for="1C">Driver's Seat</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" disabled id="1D" />
                                                <label for="1D">1D</label>
                                            </li>

                                        </ol>
                                    </li>
                                    <li class="row row--2">
                                        <ol class="seats">
                                            <li class="seatStyle">
                                                <input type="checkbox" id="2A" />
                                                <label for="2A">2A</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="2B" />
                                                <label for="2B">2B</label>
                                            </li>

                                            <li class="seatStyle">
                                                <input type="checkbox" id="2C" />
                                                <label for="2C">2C</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="2D" />
                                                <label for="2D">2D</label>
                                            </li>

                                        </ol>
                                    </li>
                                    <li class="row row--3">
                                        <ol class="seats">
                                            <li class="seatStyle">
                                                <input type="checkbox" id="3A" />
                                                <label for="3A">3A</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="3B" />
                                                <label for="3B">3B</label>
                                            </li>

                                            <li class="seatStyle">
                                                <input type="checkbox" id="3C" />
                                                <label for="3C">3C</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="3D" />
                                                <label for="3D">3D</label>
                                            </li>

                                        </ol>
                                    </li>
                                    <li class="row row--4">
                                        <ol class="seats" >
                                            <li class="seatStyle">
                                                <input type="checkbox" id="4A" />
                                                <label for="4A">4A</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="4B" />
                                                <label for="4B">4B</label>
                                            </li>

                                            <li class="seatStyle">
                                                <input type="checkbox" id="4C" />
                                                <label for="4C">4C</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="4D" />
                                                <label for="4D">4D</label>
                                            </li>

                                        </ol>
                                    </li>
                                    <li class="row row--5">
                                        <ol class="seats">
                                            <li class="seatStyle">
                                                <input type="checkbox" id="5A" />
                                                <label for="5A">5A</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="5B" />
                                                <label for="5B">5B</label>
                                            </li>

                                            <li class="seatStyle">
                                                <input type="checkbox" id="5C" />
                                                <label for="5C">5C</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="5D" />
                                                <label for="5D">5D</label>
                                            </li>

                                        </ol>
                                    </li>
                                    <li class="row row--6">
                                        <ol class="seats">
                                            <li class="seatStyle">
                                                <input type="checkbox" id="6A" />
                                                <label for="6A">6A</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="6B" />
                                                <label for="6B">6B</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="6C" />
                                                <label for="6C">6C</label>
                                            </li>
                                            <li class="seatStyle">
                                                <input type="checkbox" id="6D" />
                                                <label for="6D">6D</label>
                                            </li>

                                        </ol>
                                    </li>
                                </ol>
                                <div class="exit exit--back fuselage">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pickup">Pickup Location</label>
                                <input type="text" name="pickup" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="drop">Drop Location</label>
                                <input type="text" name="drop" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-2 col-md-10">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                <button type="submit" class="btn btn-primary">Book</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script defer>
        function checkTicket() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'}
            });
            var formData = {
                'bookingDate' : $('#bookingDate').val(),
                'route' : $('#route').val(),
                'fleet' : $('#fleet').val()
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
                            $('#radioOption').append("<input class='form-check-input' id='' type='radio' name='trip' value='" + message.id + "' onclick='displayAllocatedSeats("+ message.row +","+ message.column +",[" + message.allocated_seats+ "])'> " + message.available_seats + " seats available for " + message.vehicle.vehicle + "<br>");
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
            for (let i = 0; i < row; i++) {
                for (let j = 0; j < col; j++) {
                    if (list[index] == 0) {
                        $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;' type='checkbox' value='"+index+"'>");
                        $('#all').append("<input type='checkbox' name='all_allocated_seats[]' value='0' checked>");
                    } else {
                        $('#vehicleLayout').append("<input class='mr-1 seat' style='cursor:pointer;' type='checkbox' disabled>");
                        $('#all').append("<input type='checkbox' name='all_allocated_seats[]' value='1' checked>");
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
