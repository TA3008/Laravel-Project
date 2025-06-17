<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewerMiddleware
{
    public function handle($request, Closure $next)
{
    if (!auth()->check() || auth()->user()->role !== 'viewer') {
        abort(403, 'Bạn không có quyền truy cập.');
    }

    return $next($request);
}
}
