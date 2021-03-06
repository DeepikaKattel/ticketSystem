<html>
<head>
<meta charset="utf-8">
<title>Auto Bus Sewa</title>
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
<link href="{{asset('css/form.css')}}" rel="stylesheet" />

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
 <script src="{{ asset('js/date.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--font awesome bootstrap CDN-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>

.card {
    position: absolute;
    left: 50%;
    transform: translate(-50%,-50%);
    margin-top:80px;
    background:white;
    border-radius:20px;
}

#about{
    margin-bottom:200px;
    padding:100px;

}
.card .imageAbout {
       overflow: hidden;
       padding:20px;
}
.card .imageAbout img {
    width: 400px;
    transition: .5s;
}
.card:hover .imageAbout img {
    opacity: .5;
    transform: translateX(30%);/*100%*/
}
.card:hover .imageAbout h3{
    opacity: .5;
    transform: translateX(30%);/*100%*/
}

.card .details {
    position: absolute;
    top: 0;
    left: 0;
    width: 70%;/*100%*/
    height: 100%;
    background: rgba(40,215,226);
    transition: .5s;
    transform-origin: left;
    transform: perspective(2000px) rotateY(-90deg);
}
.card:hover .details {
    transform: perspective(2000px) rotateY(0deg);
}
.card .details .center {
    padding: 20px;
    text-align: center;
    background: #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
.card .details .center h1 {
    margin: 0;
    padding: 0;
    color: #ff3636;
    line-height: 20px;
    font-size: 20px;
    text-transform: uppercase;
}

.card .details .center h1 span {
    font-size: 14px;
    color: #262626;
}
.card .details .center p {
    margin: 10px 0;
    padding: 0;
    color: #262626;
}
.card .details .center ul {
    margin: 10px auto 0;
    padding: 0;
    display: table;
}
.card .details .center ul li {
    list-style: none;
    margin: 0 5px;
    float: left;
}
.card .details .center ul li a {
    display: block;
    background: #262626;
    color: #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    transform: .5s;
}
.card .details .center ul li a:hover {
    background: #ff3636;
}
</style>


  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->


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
   <div class="s002">
        <form  id="checkDestination">
           <fieldset>
             <legend>Auto Bus Sewa</legend>
           </fieldset>
           <div class="inner-form">
             <div class="input-field first-wrap">
               <div class="icon-wrap">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                   <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                 </svg>
               </div>
               <input class="form-control" list="firstPlace" id="destination1" name="destination1" type="text" placeholder="From"/>
               <datalist id="firstPlace">
                  @foreach($route as $r)
                      <option value="{{$r->start_point}}">{{$r->start_point}}</option>
                  @endforeach
               </datalist>
             </div>
             <div class="input-field first-wrap">
                <div class="icon-wrap">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                  </svg>
                </div>
                <input list="secondPlace" id="destination2" name="destination2" type="text" placeholder="To"/>
                 <datalist id="secondPlace">
                     @foreach($route as $r)
                        <option value="{{$r->end_point}}">{{$r->end_point}}</option>
                    @endforeach
                  </datalist>
              </div>
             <div class="input-field second-wrap">
               <div class="icon-wrap">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                   <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                 </svg>
               </div>
               <input class="datepicker" type="date" name="date" id="date" placeholder="Departure" min="{{$dateToday}}"/>
             </div>
             <div class="input-field fouth-wrap">
               <div class="icon-wrap">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                   <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                 </svg>
               </div>
               <select data-trigger="" id="vehicleType" name="vehicleType">
                   @foreach($vehicleType as $v)
                         <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
               </select>
             </div>
             <div class="input-field fouth-wrap">
                <div class="icon-wrap">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                  </svg>
                </div>
                <select data-trigger="" id="trip_type" name="trip_type">
                    <option value="Single Trip">Single Trip</option>
                    <option value="Round Trip">Round Trip</option>
                </select>
              </div>

            <div id="ifYes" class="input-field second-wrap" style="display:none">
              <div class="icon-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                </svg>
              </div>
              <input class="datepicker" type="date" name="return_date" id="return_date" placeholder="Return" min="{{$dateToday}}"/>
            </div>


             <div class="input-field fifth-wrap">
                <button id="check" type="button" class="btn-search" onclick="checkRoute()"><i class="fa fa-search">Search Bus</i></button>
             </div>
               <span class="badge alert-danger" id="notAvailable" style="display:none;font-size:15px;margin-left:5px;padding:5px;width:500px">
                     Sorry, no buses available.
               </span>
           </div>
        </form>
   </div>
   <fieldset>
     <legend>About US</legend>
     </fieldset>
   <div id="about">
       <div class="card" style="width:800px">
           <div class="imageAbout">
             <h3>Our motive is to keep customer satisfaction the top most priority.
              We make sure that each customer is safe and adopt the necessary measures.</h3>
             <img src="{{asset('images/lumbini.jpg')}}"/>
           </div>
           <div class="details">
             <div class="center">
               <h1>Founder<br><span>and team</span></h1>
               <p>"We have been established with the motive of providing the best travel service"</p>
             </div>
           </div>
        </div>
    </div>



    {{--<div class="about">
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
    </div>--}}

{{--<div class="row row-content" id="popular" style="margin-bottom:20px;width:800px;">
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
</div>--}}



<footer class="footer">
    <div class="container">
        <div class="row">
            {{--<div class="col-4 offset-1 col-sm-2">
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
                    <a href="mailto:autoBusSewa@travel.net">autoBusSewa@travel.net</a>
                </address>
            </div>--}}
            <div class="text-center">
                <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
                <h3>© Copyright 2020 Auto Bus Sewa</h3>
            </div>
        </div>

    </div>
    </footer>
</body>
 <script src="{{asset('js/jquery.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script src="{{asset('js/extention/choices.js')}}"></script>
 <script src="{{asset('js/extention/flatpickr.js')}}"></script>
    <script>
      flatpickr(".datepicker",{});
    </script>

    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>

<script defer>
     function checkRoute() {
         $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'}
         });
          var formData = {
              'destination1' : $('#destination1').val(),
              'destination2' : $('#destination2').val(),
              'date' : $('#date').val(),
              'vehicleType' : $('#vehicleType').val(),
              'trip_type' : $('#trip_type').val(),
              'return_date' : $('#return_date').val(),
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
          if($(this).scrollTop() > 200) {
              $('.navbar').addClass('solid');
          } else {
              $('.navbar').removeClass('solid');
          }
        });
    });
</script>

</html>
