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
            width:280px
        }

        .window{
            position:relative;
            width:350px;
            opacity:0;
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
          height: 130px;
          width: 940px;
          opacity:0;
        }

        input[type=radio]:checked {
          display: inline-block;
          opacity:0;
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
        <div class="col">
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
