<?php

namespace App\Http\Middleware;

use Closure;

class OperatorMiddleware
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
        //if(auth()->guard('operator')->user()->tokenCan('role:operator')){
        if(auth()->guard('driver')->user()){
            return $next($request);
        }
        return response()->json('Not Authorized', 401);
    }
}
