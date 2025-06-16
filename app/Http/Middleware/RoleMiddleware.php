<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
         $user = Auth::user();

        if (!$user || $user->role->value !== $role) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}
