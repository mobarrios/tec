<?php

namespace App\Http\Middleware;

use Closure;

class TrustProxies
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
        // Confiar en todos los proxies (Nginx, Load Balancers, Cloudflare, etc.)
        $request->setTrustedProxies([$request->getClientIp()], 
            \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL
        );

        return $next($request);
    }
}
