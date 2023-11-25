<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomersAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the access_token cookie is present
        if ($request->cookie('access_token')) {
            // If present, proceed with the request
            return $next($request);
        }

        // If access_token is not present, redirects to customers login
        return redirect(route('customers.view.login'))->withErrors([ 'login_error' => 'Sesion Finalizada!' ]);
    }
}
