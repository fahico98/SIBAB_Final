<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;



class Admin_Fun_Aux
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
        if (Auth::check() && Auth::user()->rol==1 || Auth::check() && Auth::user()->rol==2 || Auth::check() && Auth::user()->rol==3 ) {
            return $next($request);
        }
        return redirect('home');
    }
}

