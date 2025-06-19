<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EditorOrAdminMiddleware
{
    public function handle($request, Closure $next)
{
    $user = auth()->user();
    $role = optional($user)->role;

    \Log::info('EditorOrAdminMiddleware: user=' . optional($user)->id . ', role=' . ($role?->value ?? 'null'));

    if (
        !$user ||
        !in_array($role?->value, ['admin', 'editor'])
    ) {
        abort(403, 'Bạn không có quyền tạo bài viết.');
    }
    return $next($request);
}
}
