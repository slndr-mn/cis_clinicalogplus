<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): \Symfony\Component\HttpFoundation\Response  $next
     * @param  string  $permission
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = Auth::user();

        /** @var \Illuminate\Contracts\Auth\Authenticatable|\Spatie\Permission\Traits\HasRoles|null $user */
        if ($user && $user->can($permission)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
