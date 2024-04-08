<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{

    public function handle(Request $request, Closure $next, $roles)
    {
        if(auth()->check() && in_array(auth()->user()->role, explode('|', $roles))){

            return $next($request);
        }
        abort(403);
    }
}
