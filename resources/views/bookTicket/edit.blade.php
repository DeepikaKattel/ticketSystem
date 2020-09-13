@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 effect-2 jumbotron">
                <form id="bookingForm" action="{{route('bookTicket.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PATCH')
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

                            <div class="form-group col-md-6">
                                <label for="passengers">Number of Passengers</label>
                                <input type="text" name="passengers" class="form-control" required>
                            </div>
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

                        {{--                            <div class="form-group row">--}}
                        {{--                                <label for="destination" class="col-md-2 col-form-label">Trip ID</label>--}}
                        {{--                                <div class="col-5 col-md-3">--}}
                        {{--                                    <select class="form-control" id="trip_id" name="trip_id" required >--}}
                        {{--                                        @foreach($trip as $t)--}}
                        {{--                                            <option value="{{$t->id}}">{{$t->id}}</option>--}}
                        {{--                                        @endforeach--}}
                        {{--                                    </select>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

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
                    </form>
            </div>
        </div>
    </div>
@endsection
