<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next, ...$guards)
     {
         if ($jwt = $request->cookie('jwt')) {
             $request->headers->set('Authorization', 'Bearer ' . $jwt);
         }
     
         $userId = $request->user()->id;
         
         return $next($request);
     }
}
