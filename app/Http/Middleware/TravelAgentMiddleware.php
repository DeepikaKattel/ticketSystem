<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TravelAgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == '3') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role_id == '1') {
            return redirect('/AdminOnlyPage');
        }
        elseif (Auth::check() && Auth::user()->role_id == '2') {
            return redirect('/CustomerOnlyPage');
        }
        else {
            return redirect('/home');
        }
    }
}
