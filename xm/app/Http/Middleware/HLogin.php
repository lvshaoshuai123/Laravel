<?php

namespace App\Http\Middleware;

use Closure;

class HLogin
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
        if(session()->has('homeuser')){
            return $next($request); 
        }
        return redirect('/home1/login');
    }
}
