<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {

         // Allowed routes (accessible without login)
         $allowedRoutes = [
            ['path' => '/', 'method' => 'GET'],  // Login page
            ['path' => '/', 'method' => 'POST'], // Login verification
            ['path' => 'logout', 'method' => 'GET'], // Logout
        ];

        // Check if the route is allowed
        $isAllowed = collect($allowedRoutes)->contains(function ($route) use ($request) {
            return $request->path() === $route['path'] && $request->method() === $route['method'];
        });

        // Check if user is logged in (session contains 'user_id')
        if (!$request->session()->has('user_id') && !$isAllowed) {
            return redirect('/'); // Redirect to login page if not logged in
        }

        return $next($request);
    }
}
