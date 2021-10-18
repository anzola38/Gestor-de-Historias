<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControlInicioSesion
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
        if(is_null($request->session()->get('token'))){
            return $next($request);
        }
        return redirect('/');
    }
}
