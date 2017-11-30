<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMustBeActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check() || !Auth::guard($guard)->user()->isActivated()) {
            optional(Auth::guard($guard))->logout();

            $redirectPath = '/login';
            if ($guard == 'admin') {
                $redirectPath = '/admin/login';
            }

            return redirect($redirectPath);
        }

        return $next($request);
    }
}
