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

    <style>
        body, html {
            height: 100%;
            color:white;
            font-weight: bolder;
        }
        .bg {
            /* The image used */
            background: url({{asset("images/nature.jpg")}}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .btn{
            background: #f2a407;
        }
    </style>
</head>
<body>
    <div class="bg">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
    </div>
</body>
</html>
