<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditorMiddleware
{
    public function handle($request, Closure $next)
{
    if (!auth()->check() || !in_array(auth()->user()->role, ['editor', 'admin'])) {
        abort(403, 'Bạn không có quyền truy cập.');
    }

    return $next($request);
}
}
