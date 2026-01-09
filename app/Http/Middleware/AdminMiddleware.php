<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    // Only allow admin users to continue
    public function handle(Request $request, Closure $next)
    {
        // If user is not logged in, auth middleware should handle it
        $user = $request->user();

        // If no user or user is not admin, block access
        if (!$user || (!($user->is_admin ?? false) && ($user->role ?? null) !== 'admin')) {
            abort(403);
        }

        return $next($request);
    }
}
