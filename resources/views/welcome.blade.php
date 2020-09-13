<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JhunJhun Travels</title>

        <link rel="icon" type="image/png" href="{{asset('images/jhunLogo.png')}}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('css/seatLayout.css')}}">
    </head>
    <style>
        .seat{
            font-weight: bold;
            border-radius: 1px;
            background-color: darkred;
            float:left;
        }

        input:checked ~ .seat {
            background:green;
        }
    </style>
    <body>
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
            <div class="container">
                <!--data-toggle, data-target, collapse are javascript components-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto" href="#"><img src="{{asset('images/jhunLogo.png')}}" height="30" width="41"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#popular">Popular Destinations</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                @if(Auth::user()->role_id=1)
                                    <a href="{{ url('/') }}/adminOnlyPage" style="margin:5px">{{Auth::user()->firstName}}</a>

                                @elseif(Auth::user()->role_id=2)
                                    <a href="{{ url('/') }}/staffOnlyPage" style="margin:5px">{{Auth::user()->secondName}}</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <div id="bookModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="content">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Book</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
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

                                <div class="form-group col-md-6">
                                    <label for="passengers">Number of Adult Passengers</label>
                                    <input type="text" name="passengers" class="form-control" required placeholder="Number of Adult Passengers">
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

                            <div class="form-group">
                                <label for="date" class="col-md-2 col-form-label">Select Seat:</label>
                                <div class="col-6 col-md-4">
                                    <div class="exit exit--back fuselage">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input class="seat" type="checkbox" id="seat" name="seat" value="1A"/>
                                            <label for="seat">1A</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="1B"/>
                                            <label for="seat">1B</label>
                                        </div>
                                        <div class="col">
                                              <input type="checkbox" disabled id="seat" name="seat" value="D"/>
                                              <label for="seat">D</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" disabled id="seat" name="seat" value="D"/>
                                            <label for="seat">D</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="2A"/>
                                            <label for="seat">2A</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="2B"/>
                                            <label for="seat">2B</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="2C"/>
                                            <label for="seat">2C</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="2D"/>
                                            <label for="seat">2D</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="3A"/>
                                            <label for="seat">3A</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="3B"/>
                                            <label for="seat">3B</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="3C"/>
                                            <label for="seat">3C</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="3D"/>
                                            <label for="seat">3D</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="4A"/>
                                            <label for="seat">4A</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="4B"/>
                                            <label for="seat">4B</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="4C"/>
                                            <label for="seat">4C</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="4D"/>
                                            <label for="seat">4D</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="5A"/>
                                            <label for="seat">5A</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="5B"/>
                                            <label for="seat">5B</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="5C"/>
                                            <label for="seat">5C</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="5D"/>
                                            <label for="seat">5D</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="6A"/>
                                            <label for="seat">6A</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="6B"/>
                                            <label for="seat">6B</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="6C"/>
                                            <label for="seat">6C</label>
                                        </div>
                                        <div class="col">
                                            <input type="checkbox" id="seat" name="seat" value="6D"/>
                                            <label for="seat">6D</label>
                                        </div>
                                    </div>
                                    <div class="exit exit--back fuselage">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" disabled value="{{$a}}">
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
        </div>

        <header class="jumbotron">
            <div class="container">
                <div class="row row-header">
                    <div class="col-12 col-sm-6">
                        <h1>JhunJhun Travels</h1>
                        <p>We prioritize convenience for customers by providing the best service!</p>
                    </div>
                    <div class="col-12 col-sm-3 align-self-center">
                        <img src="{{asset('images/jhunLogo.png')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-3 align-self-center">
                        <a id="bookButton" role="button" class="btn btn-block nav-link btn-warning">Book Ticket</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row row-content" id="popular">
                <div class="col">
                    <div id="mycarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid"
                                     src="{{asset('images/pokhara.jpg')}}" alt="Pokhara">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Pokhara<span class="badge badge-danger">Popular</span></h2>
                                    <p class="d-none d-sm-block">A place full of diversity and natural beauty.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                     src="{{asset('images/lumbini.jpg')}}" alt="Lumbini">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Lumbini<span class="badge badge-danger">Popular</span></h2>
                                    <p class="d-none d-sm-block">A place with history and peace.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                     src="{{asset('images/janakpur.jpg')}}" alt="Janakpur">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Janakpur<span class="badge badge-danger">Popular</span></h2>
                                    <p class="d-none d-sm-block">A place of belief and cultural diversity.</p>
                                </div>
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#mycarousel" data-slide-to="1"></li>
                            <li data-target="#mycarousel" data-slide-to="2"></li>
                        </ol>
                        <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-content align-items-center" id="about">
                <div class="col-12 col-sm-4 order-sm-last col-md-3">
                    <h3>Founder</h3>
                    <p class="d-none d-sm-block">"We have been established with the motive of providing the best travel service" </p>
                </div>
                <div class="col col-sm order-sm-first col-md">
                    <h2 class="mt-0">About Us</h2>
                    <p class="d-none d-sm-block">Our motive is to keep customer satisfaction the top most priority.
                        We make sure that each customer is safe and adopt the necessary measures.</p>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-4 offset-1 col-sm-2">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-7 col-sm-5" id="contact">
                        <h5>Our Address</h5>
                        <address>
                            Kirtipur<br>
                            Kathmandu<br>
                            Nepal<br>
                            <i class="fa fa-phone fa-lg"></i> +977 4124124<br>
                            <i class="fa fa-fax fa-lg"></i> +977 26534232<br>
                            <i class="fa fa-envelope fa-lg"></i>
                            <a href="mailto:jhunTravels@travel.net">jhunTravels@travel.net</a>
                        </address>
                    </div>
                    <div class="col-12 col-sm-4 align-self-center">
                        <div class="text-center">
                            <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                            <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                            <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                            <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <p>© Copyright 2020 Jhun Travels</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <!-- jQuery, Popper.js, Bootstrap JS. -->
    <script src="{{asset('js/jquery.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#mycarousel").carousel( { interval: 2000 } );
            $("#bookButton").click(function () {
                $('#bookModal').modal('show');
            });
            $("#loginButton").click(function () {
                $('#loginModal').modal('show');
            });
        });
    </script>
</html>
