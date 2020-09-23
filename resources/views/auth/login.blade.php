@extends('layouts.app')
@section('content')
 <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">


<div class="container">
    <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{asset('images/nature.jpg')}}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <p class="login-card-description">Sign into your account</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                             <div class="col-md-14">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email address" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                             </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <div class="col-md-14">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="***********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block login-btn btn-primary" style="background:#f2a407">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" style="color:#f2a407" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                             <a class="btn btn-link" style="color:#f2a407" href="{{ route('register') }}">
                                {{ __('Not Registered?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<script>
    $(function() {
        $('#guestModal').modal({
            show: true
        });
    });--}}
</script>
@endsection
