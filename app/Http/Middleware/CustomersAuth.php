<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomersAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request has a JWT token in the Authorization header
        $token = $request->header('Authorization');

        // If not found in the header, check in the request body
        if (!$token) {
            $token = $request->input('access_token');
        }

        // If still not found, check in URL parameters
        if (!$token) {
            $token = $request->query('access_token');
        }

        // TO DO: VALIDATE TOKEN IS AUTHENTIC

        if (!$token) {
            return response()->json(['error' => 'Unauthorized. Missing JWT token.'], 401);
        }

        return $next($request);
    }
}
