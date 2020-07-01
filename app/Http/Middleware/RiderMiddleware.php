<?php

namespace App\Http\Middleware;

use Closure;

class RiderMiddleware
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
        if(Auth::check() && Auth::user()->role == "rider"){

            return $next($request); 
        }

        else{

            abort(403);
        }

    }
}
