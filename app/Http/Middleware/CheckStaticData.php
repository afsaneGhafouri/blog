<?php

namespace App\Http\Middleware;

use Closure;

class CheckStaticData
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
//        $data = $request->get('data');
//        return $data == 1 ? $next($request) : dd('Error has happened');
        $response = $next($request);


        return $response;

    }
}
