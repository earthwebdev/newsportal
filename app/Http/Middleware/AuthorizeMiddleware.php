<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect()->route("login");
        }

        //dd(auth()->user());
        if(auth()->user()->role == "admin" || auth()->user()->role == "editor") {
            return $next($request);
        }
        else{
            return redirect()->route("login");
        }

        return $next($request);
    }
}
