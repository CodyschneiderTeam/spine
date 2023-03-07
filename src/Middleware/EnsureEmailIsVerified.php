<?php

namespace Caneara\Spine\Middleware;

use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as Middleware;

class EnsureEmailIsVerified extends Middleware
{
    /**
     * Confirm that the user has verified their email address.
     *
     */
    public function handle($request, Closure $next, $redirectToRoute = null) : mixed
    {
        return parent::handle($request, $next, 'authentication.email.verify.notice');
    }
}
