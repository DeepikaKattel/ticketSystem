<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ticket System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
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
                        <a id="reserveButton" role="button" class="btn btn-block nav-link btn-warning">Book Ticket</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row row-content">
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
        </div>
    </body>
    <!-- jQuery, Popper.js, Bootstrap JS. -->
    <script src="{{asset('js/jquery.slim.min.js')}}"></script>
{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#mycarousel").carousel( { interval: 2000 } );
            $("#reserveButton").click(function () {
                $('#reserveModal').modal('show');
            });
            $("#loginButton").click(function () {
                $('#loginModal').modal('show');
            });
        });
    </script>
</html>
