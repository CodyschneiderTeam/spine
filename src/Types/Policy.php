<?php

namespace Caneara\Spine\Types;

use Caneara\Spine\Support\Str;
use Caneara\Spine\Support\Util;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Policy
{
    /**
     * Determine whether the user is authorized to perform an action.
     *
     */
    public static function can(string $method, ...$arguments) : bool
    {
        return (new static())->{$method}(Auth::user(), ...$arguments);
    }

    /**
     * Throw an exception using the given message.
     *
     */
    protected function deny(string $message = '') : void
    {
        throw new AccessDeniedHttpException(
            Util::blank($message) ? $this->makeErrorMessage() : $message
        );
    }

    /**
     * Throw an exception when the given condition is true.
     *
     */
    protected function denyIf(bool $condition, string $message = '') : mixed
    {
        return $condition ? $this->deny($message) : $this;
    }

    /**
     * Throw an exception unless the given condition is true.
     *
     */
    protected function denyUnless(bool $condition, string $message = '') : mixed
    {
        return ! $condition ? $this->deny($message) : $this;
    }

    /**
     * Permit access to the user.
     *
     */
    public function grantAccess() : bool
    {
        return true;
    }

    /**
     * Generate an error message using the policy class and method name.
     *
     */
    protected function makeErrorMessage() : string
    {
        return Str::of(debug_backtrace()[3]['function'])
            ->append(' this ')
            ->append(debug_backtrace()[3]['class'])
            ->replace('App\\Policies\\', '')
            ->replace('Policy', '')
            ->lower()
            ->prepend('You cannot ')
            ->toString();
    }
}
