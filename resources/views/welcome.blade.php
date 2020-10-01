<html>
<head>
<meta charset="utf-8">
<title>Jhun Jhun Travels</title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet" href="{{asset('css/frontEnd.css')}}">
 <link rel="stylesheet" href="{{asset('css/styles.css')}}">
 <link type="text/css" rel="stylesheet" href="{{asset('css/bookForm.css')}}" />



 <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cantata+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Imprima" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap-combobox.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="navbar-brand mr-auto" href="#"><img src="{{asset('images/jhunLogo.png')}}" height="50" width="100"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
           <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
           <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
           <li class="nav-item"><a class="nav-link" href="#popular">Popular Destinations</a></li>
           <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
           </ul>
           <div style="margin-top:30px;font-weight:bolder">
             @if (Route::has('login'))
             @auth
                 @if(Auth::user()->role_id=1)
                     <a href="{{ url('/') }}/adminOnlyPage" style="margin:5px">{{Auth::user()->firstName}}</a>

                 @elseif(Auth::user()->role_id=2)
                     <a href="{{ url('/') }}/customerOnlyPage" style="margin:5px">{{Auth::user()->firstName}}</a>
                  @elseif(Auth::user()->role_id=3)
                     <a href="{{ url('/') }}/travelAgentOnlyPage" style="margin:5px">{{Auth::user()->firstName}}</a>
                   @elseif(Auth::user()->role_id=4)
                     <a href="{{route('/')}}" style="margin:5px">{{Auth::user()->firstName}}</a>
                 @endif
                 <a href="{{ route('logout') }}" style="margin:5px" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
             @else
                 <a href="{{ route('login') }}">Login</a>
                 @if (Route::has('register'))
                     <a href="{{ route('register') }}">Register</a>
                 @endif
             @endauth
            @endif
            </div>


        </div><!--/.nav-collapse -->
      </div>
    </nav>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error" role="alert" style="background: red">
            {!! session('error') !!}
        </div>
    @endif

<div class="image">
    <h1 class="heading">JhunJhun Travels</h1>
    <div class="row justify">
        <h4>We prioritize convenience for customers by providing the best service!</h3>
        <div id="booking" class="section">
        		<div class="section-center">
        			<div class="container">
        				<div class="row">
        					<div class="booking-form">
        						<form id="checkDestination">
        						@csrf
        							<div class="col-md-3">
        								<div class="form-group"  style="box-shadow:5px 5px">
        									<span class="form-label">From</span>
        									<select class="form-control" id="destination1"name="destination1" required >
        										@foreach($route as $r)
                                                    <option value="{{$r->start_point}}">{{$r->start_point}}</option>
                                                @endforeach
        									</select>
        									<span class="select-arrow"></span>
        								</div>
        							</div>
        							<div class="col-md-3">
                                        <div class="form-group" style="box-shadow:5px 5px">
                                            <span class="form-label">From</span>
                                            <select class="form-control" id="destination2" name="destination2" required>
                                                @foreach($route as $r)
                                                    <option value="{{$r->end_point}}">{{$r->end_point}}</option>
                                                @endforeach
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group" style="box-shadow:5px 5px">
                                            <span class="form-label">Departure Date</span>
                                            <input class="form-control" type="date" name="date" id="date" required>
                                        </div>
                                    </div>
        							<div class="col-md-3">
        								<div class="form-btn" style="box-shadow:5px 5px">
        									 <button id="check" type="button" class="btn btn-primary form-control mr-sm-4" style="background:#f2a407;height:60px;" onclick="checkRoute()">Check Availability</button>
        								    <span class="pl-2" id="notAvailable" style="display:none;color:white;font-weight:bolder">
                                                Sorry, no buses available. Try again.
                                            </span>
        								</div>
        							</div>
        						</form>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
</div>
<div class="about">
 <div class="row row-content align-items-center" id="about">
     <div class="col-12 col-sm-4 order-sm-last col-md-3">
         <h3>Founder</h3>
         <p class="d-none d-sm-block">"We have been established with the motive of providing the best travel service"</p>
     </div>
     <div class="col col-sm order-sm-first col-md">
         <h2 class="mt-0">About Us</h2>
         <p class="d-none d-sm-block">Our motive is to keep customer satisfaction the top most priority.
             We make sure that each customer is safe and adopt the necessary measures.</p>
     </div>
 </div>
</div>
<div class="row row-content" id="popular" style="margin-bottom:20px;width:800px;">
<h2 style="margin-left:300px;color:white">Popular Destination</h2>
    <div class="col">
        <div id="mycarousel" class="carousel slide" data-ride="carousel" style="box-shadow:10px 10px">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid"
                         src="{{asset('images/pokhara.jpg')}}" alt="Pokhara" style="height:300px;width:500px">
                    <div class="carousel-caption d-none d-md-block" style="margin-left:400px">
                        <h2>Pokhara<span class="badge badge-danger">Popular Destination</span></h2>
                        <p class="d-none d-sm-block">A place full of diversity and natural beauty.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid"
                         src="{{asset('images/lumbini.jpg')}}" alt="Lumbini" style="height:300px;width:500px">
                    <div class="carousel-caption d-none d-md-block" style="margin-left:400px">
                        <h2>Lumbini<span class="badge badge-danger">Popular Destination</span></h2>
                        <p class="d-none d-sm-block">A place with history and peace.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid"
                         src="{{asset('images/janakpur.jpg')}}" alt="Janakpur" style="height:300px;width:500px">
                    <div class="carousel-caption d-none d-md-block" style="margin-left:400px">
                        <h2>Janakpur<span class="badge badge-danger">Popular Destination</span></h2>
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
 <script src="{{asset('js/jquery.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script defer>
     function checkRoute() {
         $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'}
         });
          var formData = {
              'destination1' : $('#destination1').val(),
              'destination2' : $('#destination2').val(),
              'date' : $('#date').val(),
          };
          $.ajax({
              type: 'GET',
              url: '/route/checkRoute',
              data: formData,
              dataType: 'json',
              success: function(data){
                  $('#notAvailable').hide();
                  $('#available').hide();
                  if (data.routesList.length == 0) {
                      $('#notAvailable').show();
                  }else{
                      window.location.href = "{{route('book')}}"
                  }
              },
              error: function (data) {
                  console.log("Error from the server");
                  $('#notAvailable').show();

              }
          });
     }
</script>
<script>
    $(document).ready(function() {
        // Transition effect for navbar
        $(window).scroll(function() {
          // checks if window is scrolled more than 500px, adds/removes solid class
          if($(this).scrollTop() > 500) {
              $('.navbar').addClass('solid');
          } else {
              $('.navbar').removeClass('solid');
          }
        });
    });
</script>

</html>
