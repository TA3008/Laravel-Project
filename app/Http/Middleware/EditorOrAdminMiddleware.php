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
        $user = Auth::user();

        if (!$user || !in_array($user->role, ['editor', 'admin'])) {
            abort(403, 'Bạn không có quyền tạo bài viết.');
        }

        return $next($request);
    }
}
