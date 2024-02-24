<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ckFinderAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        config(['ckfinder.authentication' => function () {
            return true;
        }]);

        return $next($request);
    }
}
