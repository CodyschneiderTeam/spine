<?php

namespace System\Middleware;

use Closure;
use System\Support\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use System\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next, string ...$guards) : Response
    {
        $route =

        $guards = Util::blank($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return Redirect::route(RouteServiceProvider::home());
            }
        }

        return $next($request);
    }
}
