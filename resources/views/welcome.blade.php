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
                                <a href="{{ url('/home') }}">Home</a>
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
                        <form id="bookingForm">
                            <div class="form-group row">
                                <label for="destination" class="col-md-2 col-form-label">Destination</label>
                                <div class="col-5 col-md-3">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="mr-1 col-form-label">From:</label><input class="mr-2" type="text" name="from" id="from" autocomplete="off">
                                        <label class="mr-1 col-form-label">To:</label><input type="text" name="from" id="from" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-2 col-form-label">Number of Passengers</label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                        <label class="form-check-label" for="inlineRadio4">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                                        <label class="form-check-label" for="inlineRadio5">5</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6">
                                        <label class="form-check-label" for="inlineRadio6">6</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-label">Vehicle Type</label>
                                <div class="col-5 col-md-3">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-success active">
                                            <input type="radio" name="options" id="nonSmoking" autocomplete="off" checked> AC Deluxe Bus
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="options" id="smoking" autocomplete="off"> Normal Deluxe Bus
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="options" id="smoking" autocomplete="off"> Micro
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-label">Select Seat:</label>
                                <div>
                                    <ol class="cabin">
                                        <li class="row row--1">
                                            <ol class="seats">
                                                <li class="seat">
                                                    <input type="checkbox" id="1A" />
                                                    <label for="1A">1A</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="1B" />
                                                    <label for="1B">1B</label>
                                                </li>

                                                <li class="seat">
                                                    <input type="checkbox" disabled id="1C" />
                                                    <label for="1C">Driver's Seat</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" disabled id="1D" />
                                                    <label for="1D">1D</label>
                                                </li>

                                            </ol>
                                        </li>
                                        <li class="row row--2">
                                            <ol class="seats">
                                                <li class="seat">
                                                    <input type="checkbox" id="2A" />
                                                    <label for="2A">2A</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="2B" />
                                                    <label for="2B">2B</label>
                                                </li>

                                                <li class="seat">
                                                    <input type="checkbox" id="2C" />
                                                    <label for="2C">2C</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="2D" />
                                                    <label for="2D">2D</label>
                                                </li>

                                            </ol>
                                        </li>
                                        <li class="row row--3">
                                            <ol class="seats">
                                                <li class="seat">
                                                    <input type="checkbox" id="3A" />
                                                    <label for="3A">3A</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="3B" />
                                                    <label for="3B">3B</label>
                                                </li>

                                                <li class="seat">
                                                    <input type="checkbox" id="3C" />
                                                    <label for="3C">3C</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="3D" />
                                                    <label for="3D">3D</label>
                                                </li>

                                            </ol>
                                        </li>
                                        <li class="row row--4">
                                            <ol class="seats" >
                                                <li class="seat">
                                                    <input type="checkbox" id="4A" />
                                                    <label for="4A">4A</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="4B" />
                                                    <label for="4B">4B</label>
                                                </li>

                                                <li class="seat">
                                                    <input type="checkbox" id="4C" />
                                                    <label for="4C">4C</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="4D" />
                                                    <label for="4D">4D</label>
                                                </li>

                                            </ol>
                                        </li>
                                        <li class="row row--5">
                                            <ol class="seats">
                                                <li class="seat">
                                                    <input type="checkbox" id="5A" />
                                                    <label for="5A">5A</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="5B" />
                                                    <label for="5B">5B</label>
                                                </li>

                                                <li class="seat">
                                                    <input type="checkbox" id="5C" />
                                                    <label for="5C">5C</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="5D" />
                                                    <label for="5D">5D</label>
                                                </li>

                                            </ol>
                                        </li>
                                        <li class="row row--6">
                                            <ol class="seats">
                                                <li class="seat">
                                                    <input type="checkbox" id="6A" />
                                                    <label for="6A">6A</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="6B" />
                                                    <label for="6B">6B</label>
                                                </li>
                                                <li class="seat">
                                                    <input type="checkbox" id="6C" />
                                                    <label for="6C">6C</label>
                                                </li>
                                                <li class="seat">
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
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-label">Date</label>
                                <div class="col-5 col-md-3">
                                    <input type="date" class="form-control" id="date" name="date" placeholder="Date">
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
