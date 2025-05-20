<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        // Force Accept header to application/json
        $request->headers->set('Accept', 'application/json');
        
        // Process the request
        $response = $next($request);
        
        // After middleware processing - check if we have an error response
        if ($response->getStatusCode() === 405) {
            return response()->json([
                'message' => 'Method Not Allowed'
            ], 405);
        }
        
        return $response;
    }
}