<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class PrimeiroMiddleware
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
        Log::debug("passou pelo primeiro middleware antes");
        // return response("parando a cadeia de chamadas");
        $response = $next($request);
        Log::debug("passou pelo primeiro middleware depois");
        // return $response;
        return $response->setContent("Alterei a resposta", 201);
    }
}
