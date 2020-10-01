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
        .exit{
            position:relative;
            height:20px;
            width:220px
        }
        .window{
            position:relative;
            height:20px;
            width:290px
        }
        .window:after,.window:before{
            content:"WINDOW";
            font-size:10px;
            line-height:20px;
            padding:0 2px;font-family:Arial Narrow,Arial,sans-serif;
            margin-top: 50px;
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

        input[type=checkbox]{
            box-sizing: border-box;
            padding: 0;
            height: 30px;
            width: 40px;
        }
        .section {
        	position: relative;
        	height: 60vh;
        }

        .section .section-center {
        	position: absolute;
        	top: 20%;
        	left: 0;
        	right: 0;
        	-webkit-transform: translateY(-50%);
        	transform: translateY(-50%);
        }

        #booking {
        	font-family: 'Imprima', sans-serif;
        	background-size: cover;
        	background-position: center;
        }

        .booking-form .form-group {
        	position: relative;
        	height: 60px;
        	margin-bottom: 10px;
        	margin-right: -10px;
        	margin-left: -10px;
        }

        .booking-form .form-control {
        	font-family: 'Cantata One', serif;
        	background-color: transparent;
        	border-radius: 0px;
        	border: none;
        	height: 60px;
        	-webkit-box-shadow: none;
        	box-shadow: none;
        	font-size: 24px;
        	color: #333;
        	font-weight: 300;
        	background: rgba(255, 255, 255, 0.85);
        	padding-top: 15px;
        	-webkit-transition: 0.2s background;
        	transition: 0.2s background;
        }

        .booking-form .form-control:focus {
        	background: rgba(255, 255, 255, 1);
        	-webkit-box-shadow: none;
        	box-shadow: none;
        }

        .booking-form .form-control::-webkit-input-placeholder {
        	color: rgba(51, 51, 51, 0.3);
        }

        .booking-form .form-control:-ms-input-placeholder {
        	color: rgba(51, 51, 51, 0.3);
        }

        .booking-form .form-control::placeholder {
        	color: rgba(51, 51, 51, 0.3);
        }

        .booking-form input[type="date"].form-control:invalid {
        	color: rgba(51, 51, 51, 0.3);
        }


        .booking-form select.form-control {
        	-webkit-appearance: none;
        	-moz-appearance: none;
        	appearance: none;
        }

        select {
            font-family: 'FontAwesome', 'Second Font name', serif;
        }

        .booking-form select.form-control+.select-arrow {
        	position: absolute;
        	right: 0px;
            top:0px;
        	bottom: 0px;
        	width: 24px;
        	text-align: center;
        	pointer-events: none;
        	background: rgba(255, 255, 255, 0.3);
        	height: 60px;
        	line-height: 80px;
        }

        .booking-form select.form-control+.select-arrow:after {
        	content: '\279C';
        	display: block;
        	-webkit-transform: rotate(90deg);
        	transform: rotate(90deg);
        	color: #333;
        	font-size: 14px;
        }

        .booking-form .form-label {
        	color: #f2a407;
        	display: block;
        	font-weight: 700;
        	height: 30px;
        	line-height: 30px;
        	font-size: 14px;
        	letter-spacing: 0.6px;
        	position: absolute;
        	left: 10px;
        	top: 0px;
        }

        .booking-form .form-btn {
        	height: 60px;
        	margin-right: -10px;
        	margin-left: -10px;
        	margin-bottom: 10px;
        }

        .booking-form .submit-btn {
        	background: #8c5d28;
        	border: none;
        	font-weight: 300;
        	text-transform: uppercase;
        	letter-spacing: 0.6px;
        	height: 60px;
        	border-radius: 0px;
        	font-size: 18px;
        	width: 100%;
        	color: #fff;
        }

        .booking-cta {
        	text-align: center;
        }

        .booking-cta {
        	margin-bottom: 30px;
        }

        .booking-cta h1 {
        	font-family: 'Cantata One', serif;
        	color: #fff;
        	margin: 0px;
        	font-size: 52px;
        	font-weight: 700;
        }


        .btn{
            background: #f2a407;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'JhunJhun Travels') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
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
    <div class="container m-5 p-5">
        <div class="col-lg-10 col-md-7 col-offset-6 centered">
            @yield('content')
        </div>
    </div>
    <div class="row justify-content-center mr-5">
        <div class="col-auto">
            <p>© Copyright 2020 Jhun Travels</p>
        </div>
    </div>
</body>
</html>
