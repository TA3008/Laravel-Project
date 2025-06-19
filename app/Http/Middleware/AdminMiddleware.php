<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    $user = auth()->user();
    $role = optional($user)->role;

    if (
        !$user ||
        !in_array($role?->value, ['admin'])
    ) {
        abort(403, 'Bạn không có quyền truy cập.');
    }
    return $next($request);
}
}
