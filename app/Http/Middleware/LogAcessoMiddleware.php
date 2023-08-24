<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
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
        //1º Request 

        //return $next($request);

        return Response('Chegamos no middaleware e finalizamos nele próprio');

        //Response
    }
}
