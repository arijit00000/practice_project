<?php

namespace App\Http\Middleware\Adult;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Adult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($session()->has('id')){
            return $next($request);
        }
        else{
            echo "Arijit Your are not allowed";
        }
        
    }
}
