<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function redirectTo() {
        if (Auth::check() && Auth::user()->role_id == '1') {
            return('/adminOnlyPage');
        }
        elseif (Auth::check() && Auth::user()->role_id == '2') {
            return('/customerOnlyPage');
        }
        else{
            return redirect('/');
        }
    }
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect('/');
    }
    protected function authenticated(Request $request)
    {
        if ( Session::get('book') ) {
            return redirect('/tickets/book');
        }
        else{
            return redirect('/');
        }
    }
}
