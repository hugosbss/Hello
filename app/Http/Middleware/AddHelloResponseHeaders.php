<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddHelloResponseHeaders
{
    /**
     * Exit middleware: mutates the response after controller execution.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Hello-App', 'Hello Social');
        $response->headers->set('X-Hello-Route-Type', $request->is('api/*') ? 'api' : 'web');

        return $response;
    }
}
