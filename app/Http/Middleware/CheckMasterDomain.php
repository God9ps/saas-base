<?php

namespace App\Http\Middleware;

use Closure;

class CheckMasterDomain
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
//        dd($request->getHost(), config('tenant.master_domain'));
        if( $request->getHost() !== config('tenant.master_domain')){
            abort(401,'Unauthorized domain.');
        }
        return $next($request);
    }
}
