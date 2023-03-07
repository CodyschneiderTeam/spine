<?php

namespace Caneara\Spine\Types;

use Caneara\Spine\Support\Is;
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
        throw new AccessDeniedHttpException($message);
    }

    /**
     * Throw an exception when the given condition is true.
     *
     */
    protected function denyIf(bool | array $condition, string $message = '') : bool
    {
        if (Is::boolean($condition)) {
            return $condition ? $this->deny($message) : true;
        }

        foreach ($condition as $check => $response) {
            $this->denyIf($check, $response);
        }

        return true;
    }

    /**
     * Throw an exception unless the given condition is true.
     *
     */
    protected function denyUnless(bool | array $condition, string $message = '') : bool
    {
        if (Is::boolean($condition)) {
            return $condition ? true : $this->deny($message);
        }

        foreach ($condition as $check => $response) {
            $this->denyUnless($check, $response);
        }

        return true;
    }
}
