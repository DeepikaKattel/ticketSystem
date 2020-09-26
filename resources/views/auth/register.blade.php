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
              <p class="login-card-description">Registration Form</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="firstName" class="sr-only">{{ __('First Name') }}</label>
                             <div class="col-md-14">
                                 <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus placeholder="First Name">
                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="sr-only">{{ __('Last Name') }}</label>
                            <div class="col-md-14">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus placeholder="Last Name">

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

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

                        <div class="form-group row ml-1">
                            <label for="role">{{ __('Role') }}</label>
                                <div class="form-check ml-2 mr-2" id="radioOption">
                                    <input class='form-check-input' type='radio' name='role_id' value='2'>Customer<br>
                                </div>
                                <div class="form-check" id="radioOption">
                                    <input class='form-check-input' type='radio' name='role_id' value='3'>Travel Agent
                                </div>

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <div class="col-md-14">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>

                            <div class="col-md-14">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="phone" class="sr-only">{{ __('Phone Number') }}</label>

                            <div class="col-md-14">
                                <input id="phone" type="number" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Phone Number">

                                <span class="invalid-feedback" role="alert" id="phoneError">
                                <strong></strong>
                            </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block login-btn btn-primary" style="background:#f2a407">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
