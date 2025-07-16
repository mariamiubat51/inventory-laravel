<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is not admin, redirect to dashboard or 403
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
