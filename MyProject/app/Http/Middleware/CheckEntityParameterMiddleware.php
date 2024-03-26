<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEntityParameterMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->has('entity')){
            $request->merge(['entity' => 'default_value']);
        }
        return $next($request);
    }
}
