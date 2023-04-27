<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return void
     */
    public function handle(Request $request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin'       => '*',
            'Access-Control-Allow-Method'       => 'POST, GET, OPTIONS, PUT, PATCH, DELETE',
            'Access-Control-Allow-Credentials'  => 'true',
            'Access-Control-Max-Age'            => 86400,
            'Access-Control-Allow-Headers'      => 'Content-Type, Authorization, X-Requested-With',
        ];

        if($request->isMethod('OPTIONS')) {
            return new JsonResponse(['method' => 'OPTIONS'], 200, $headers);
        }

        $response = $next($request);
        foreach($headers as $key => $header) {
            $response->header($key, $header);
        }

        return $response;
    }
}