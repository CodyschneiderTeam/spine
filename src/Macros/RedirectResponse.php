<?php

namespace Caneara\Spine\Macros;

use Caneara\Spine\Support\Util;
use Illuminate\Http\RedirectResponse as Facade;

class RedirectResponse
{
    /**
     * Register the macros.
     *
     */
    public static function register() : void
    {
        static::notify();
    }

    /**
     * Register the 'notify' macro.
     *
     */
    protected static function notify() : void
    {
        Facade::macro('notify', function($message, $type = 'success', $fixed = false) {
            return Util::tap($this)->with('notification', compact('message', 'type', 'fixed'));
        });
    }
}
