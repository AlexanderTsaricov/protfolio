<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('Admin panel access attempt', [
            'url' => $request->fullUrl(),
            'user' => Auth::check() ? Auth::id() : null,
        ]);

        return $next($request);
    }
}
