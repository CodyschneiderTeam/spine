<?php

namespace Caneara\Spine\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Retrieve the path the guests should be redirected to.
     *
     */
    protected function redirectTo(Request $request)
    {
        return $request->expectsJson() ? null : URL::route('authentication.login');
    }
}
