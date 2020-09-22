@extends('layouts.app')
@section('content')
<div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="guestModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('Sign Up') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="signUpForm" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}"   autofocus>

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}"   autofocus>

                            <span class="invalid-feedback" role="alert" >
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailInput" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required >

                            <span class="invalid-feedback" role="alert" id="emailError">
                            <strong></strong>
                        </span>
                        </div>
                    </div>
                  <div class="form-group row">
                     <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                     <div class="col-md-6">
                         <div class="form-check" id="radioOption">
                             <input class='form-check-input' type='radio' name='role_id' value='4'>Guest<br>
                         </div>

                         @error('role')
                         <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>
                    <input id="password" type="password" value="guest1234" name="password" hidden>
                    <input id="password-confirm" type="password"  value="guest1234" name="password_confirmation" hidden>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="number" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}" >

                            <span class="invalid-feedback" role="alert" id="phoneError">
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign Up') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card" style="background:none;border:2px solid">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background:#f2a407">
                                    {{ __('Login') }}
                                </button>
                                <a class="btn-link" style="color:#f2a407" href="/guest" data-toggle="modal"
                                   data-target="#guestModal">
                                    {{ __('Sign Up As Guest') }}
                                </a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn-link" style="color:#f2a407" href="{{ route('register') }}">
                                    {{ __('Not Registered?') }}
                                </a>

                                @if (Route::has('password.request'))
                                    <a class="btn-link" style="color:#f2a407" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#guestModal').modal({
            show: true
        });
    });
</script>
@endsection
