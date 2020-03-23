<?php

namespace App\Http\Middleware;

use Closure;


class Cors {   

        
    
    public function handle($request, Closure $next)
    {
        if(isset($request->server()['HTTP_ORIGIN'])) {
            $origin = $request->server()['HTTP_ORIGIN'];

            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
            header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
            header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Requested-With, X-CSRF-TOKEN, Cache-Control");
        }
        if ($request->getMethod() === "OPTIONS") {
            return response('');
        }
        
        return $next($request);
    }
}