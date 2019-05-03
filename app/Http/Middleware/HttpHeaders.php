<?php

namespace App\Http\Middleware;

use Closure;

class HttpHeaders
{
    public function handle($request, Closure $next)
    {
        header_remove('Access-Control-Allow-Credentials');
        header_remove('Access-Control-Allow-Origin');

        return $next($request);
    }
}
