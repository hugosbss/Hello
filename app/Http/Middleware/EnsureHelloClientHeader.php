<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureHelloClientHeader
{
    /**
     * Entry middleware: validates request data before controller execution.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/*') && !$request->headers->has('X-Hello-Client')) {
            return response()->json([
                'message' => 'Missing X-Hello-Client header.',
            ], 400);
        }

        return $next($request);
    }
}
