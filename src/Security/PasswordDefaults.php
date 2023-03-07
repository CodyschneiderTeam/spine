<?php

namespace Caneara\Spine\Security;

use Illuminate\Validation\Rules\Password;

class PasswordDefaults
{
    /**
     * Define the minimum password requirements.
     *
     */
    public static function enforce() : void
    {
        Password::defaults(function() {
            return Password::min(12)
                ->letters()
                ->numbers()
                ->symbols()
                ->mixedCase()
                ->uncompromised();
        });
    }
}
