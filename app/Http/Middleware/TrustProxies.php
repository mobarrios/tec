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
        // Para Laravel 5.1, configuramos manualmente los proxies de confianza
        // Esto permite que Laravel detecte correctamente HTTPS detrás de un proxy
        
        // Confiar en el proxy actual
        $request->setTrustedProxies(['127.0.0.1', $request->getClientIp()]);

        return $next($request);
    }
}
