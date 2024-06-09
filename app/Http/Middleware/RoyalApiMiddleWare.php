<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Types\RoyalApiController;
use Closure;
use Illuminate\Http\Request;

class RoyalApiMiddleWare extends RoyalApiController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
       if(isset($this->customer)) return $next($request);
       return "error";
    }
}
