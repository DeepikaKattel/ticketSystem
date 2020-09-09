@extends('layouts.app')
@section('content')
    <div class="main_container">
        <div class="container-fluid right-col">
            @yield('rightContent')
        </div>
        <div class="left_col scroll-view">
            @include("adminPanel.sidebar")
        </div>
    </div>
@endsection


