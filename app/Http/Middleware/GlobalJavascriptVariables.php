<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GlobalJavascriptVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $globalVariables = [];

        // Url Helper.
        $globalVariables['baseUrl'] = url('');
        $globalVariables['baseApiUrl'] = url('api');

        // User Authenticated.
        $guard = $request->segment(1) === 'admin' ? Auth::guard('admin') : Auth::guard();
        $globalVariables['signed'] = $guard->check();
        if ($guard->check()) {
            $globalVariables['userId'] = $guard->user();
        }

        // CSRF
        $globalVariables['csrfToken'] = csrf_token();

        View::share('globalVariables', $globalVariables);

        return $next($request);
    }
}
