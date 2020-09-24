@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{asset('images/nature.jpg')}}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <p class="login-card-description">Sign In</p>
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
                                 <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="***********">

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
                             <a href="{{ route('password.request')}}" style="color:#f2a407" class="forgot-password-link">Forgot password?</a>
                            @endif
                             <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" style="color:#f2a407">Register here</a></p>
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
