<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JhunJhun Travels') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome Icons-->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">


    <style>
        body, html {
            color:white;
            font-weight: bolder;
            background: url({{asset("images/nature.jpg")}}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        body:before{
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
        }
        .exit{
            position:relative;
            height:20px;
            width:280px
        }

        .window{
            position:relative;
            width:350px;
        }
        .window:after,.window:before{
            content:"WINDOW";
            font-size:10px;
            line-height:20px;
            padding:0 2px;font-family:Arial Narrow,Arial,sans-serif;
            margin-top: 120px;
            display:block;
            position:absolute;
            background:green;
            color:#fff;
            top:50%;
            transform: rotate(90deg);
            transform-origin: left top 0;

        }
        .window:before{
            left:0
        }
        .window:after{
            right:0
        }

        .exit:after,.exit:before{
            content:"EXIT";
            font-size:10px;
            line-height:10px;
            padding:0 2px;font-family:Arial Narrow,Arial,sans-serif;
            display:block;
            position:absolute;
            background:red;
            color:#fff;
            top:50%;
            transform:translateY(-50%)
        }
        .exit:before{
            left:0
        }
        .exit:after{
            right:0
        }
        .fuselage{border-right:5px solid #d8d8d8;
            border-left:5px solid #d8d8d8
        }
        input[type='checkbox']{
          width: 50px !important;
          height: 50px !important;
          margin: 5px;
          -webkit-appearance: none;
          -moz-appearance: none;
          -o-appearance: none;
          appearance: none;
          outline: 1px solid green;
          box-shadow: none;
          font-size: 0.8em;
          text-align: center;
          line-height: 1em;
          background: #a2e681;
        }

        input[type='checkbox']:checked{
          background: url("https://img.icons8.com/officel/40/000000/occupied-theatre-seat.png") no-repeat center center;
           outline: 1px solid red;
          color: white;
        }

        input[type='checkbox']:not(:checked){
          background: url("https://img.icons8.com/ultraviolet/40/000000/theatre-seat.png") no-repeat center center;
          outline: 1px solid green;
          color: white;
        }

        {{--input[type=checkbox]{
            box-sizing: border-box;
            padding: 0;
            height: 50px;
            width: 50px;
            margin:5px;
        }
        input[type="checkbox" i] {
            background-color: green;
        }--}}

        input[type=radio] {
          margin-left:1px;
          -webkit-appearance: none;
          outline: 0.1em solid black;
          outline-offset: 0.1em;
          height: 40px;
          width: 95px;
          opacity:0;
          bottom:0px;
        }

        input[type=radio]:checked {
          display: inline-block;
          opacity:0;
        }
       [data-title]:hover:after {
           opacity: 1;
           transition: all 0.1s ease 0.5s;
           visibility: visible;
       }
       [data-title]:after {
           content: attr(data-title);
           background-color: red;
           color: white;
           height:25px;
           font-size: 150%;
           position: absolute;
           padding: 5px;
           bottom: -1.6em;
           left: 100%;
           white-space: nowrap;
           box-shadow: 1px 1px 3px #222222;
           opacity: 0;
           border: 1px solid #111111;
           z-index: 99999;
           visibility: hidden;
       }
       [data-title] {
           position: relative;
       }

        .btn{
            background: rgba(40,215,226);
            height:50px;
            width:100px;
        }
        .btn:hover{
            background:#4c6792;
        }
        img {
        	position: absolute;
        	top: 15px;
        	z-index: 0;

        }

        * {
        	box-sizing: border-box;
        }


        .outer {
        	position: relative;
        	background: #fff;
        	height: 200px;
        	width: 100%;
        	overflow: hidden;
        	display: flex;
        	align-items: center;

        }

        .big-icon {
            font-size: 100px;
            margin-left:1000px;
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
        }

        .button a {
        	display: inline-block;
        	overflow: hidden;
        	position: relative;
        	font-size: 15px;
        	color: #111;
        	text-decoration: none;
        	padding: 5px 5px;
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



        .footer {
        	position: absolute;
        	bottom: 0;
        	right: 0;
        }

        h2{
           color: #4c6792;
           display:inline-block;
           margin-left:200px;
           font-family:"Berlin Sans FB",sans-serif;
        }
         h3{
           color: #4c6792;
           font-family:"Berlin Sans FB",sans-serif;
        }
         h4{
           color: #4c6792;
           display:inline-block;
           font-family:"Arial",sans-serif;
        }


    </style>
</head>
<body>

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
    @yield('content')
    </div>
    <div class="row justify-content-center mr-5">
        <div class="col-auto">
            <p>© Copyright 2020 Jhun Travels</p>
        </div>
    </div>
</body>
</html>
