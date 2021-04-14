<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Applied
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //role == 1 is applied
        if (Auth::user()->role==1) {
            return $next($request);
        }

        //role == 2 is crops
        if (Auth::user()->role == 2) {
            return redirect()->route('crops');
        }

        //role == 3 is fishery
        if (Auth::user()->role == 3) {
            return redirect()->route('fishery');
        }

        //role == 4 is livestock
        if (Auth::user()->role == 4) {
            return redirect()->route('livestock');
        }

        //role == 5 is research
        if (Auth::user()->role == 5) {
            return redirect()->route('research');
        }

        //role == 6 is farmers
        if (Auth::user()->role == 6) {
            return redirect()->route('farmers');
        }

    }
}
