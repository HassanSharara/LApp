<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Types\ApiFunctionsController;
use App\Models\System\Customer\Customer;
use Closure;
use Illuminate\Http\Request;

class RoyalFirstRequest extends ApiFunctionsController
{
    private $secretToken="$@6846546FGdasdfa864f68gd868d4g684jk5g8kf4684864eg68w4g684kt864j8er4gw68e46v544$#%788894684fdsg__(03242342134_+4w653425623456)";
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token=$request->bearerToken();
        if($token==$this->secretToken)return $next($request);

        if(Customer::where('api_token',$token)->first()!=null)return $next($request);


        return $this->notAUth();

        
    }
}
