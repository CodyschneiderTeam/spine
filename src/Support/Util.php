<?php

namespace System\Support;

use Closure;
use Exception;
use Throwable;

class Util
{
    /**
     * Determine if the given value is blank.
     *
     */
    public static function blank(mixed $value) : bool
    {
        return blank($value);
    }

    /**
     * Determine if the given value is not blank.
     *
     */
    public static function filled(mixed $value) : bool
    {
        return ! static::blank($value);
    }

    /**
     * Catch a potential exception and return a default value.
     *
     */
    public static function rescue(callable $callback, mixed $default = null, bool $report = false) : mixed
    {
        return rescue($callback, $default, $report);
    }

    /**
     * Retry an operation a given number of times.
     *
     */
    public static function retry(int $times, callable $callback, int $delay = 0, callable $when = null) : mixed
    {
        return retry($times, $callback, $delay, $when);
    }

    /**
     * Call the given Closure with the given value then return the value.
     *
     */
    public static function tap(mixed $value, callable $callback = null) : mixed
    {
        return tap($value, $callback);
    }

    /**
     * Throw the given exception when the given value is truthy.
     *
     */
    public static function throwIf(mixed $condition, string | Throwable $exception) : void
    {
        $condition = Is::callable($condition) ? $condition() : $condition;

        $exception = Is::string($exception) ? new Exception($exception) : $exception;

        static::when($condition, fn() => throw $exception);
    }

    /**
     * Throw the given exception when the given value is falsy.
     *
     */
    public static function throwUnless(mixed $condition, string | Throwable $exception) : void
    {
        $condition = Is::callable($condition) ? $condition() : $condition;

        $exception = Is::string($exception) ? new Exception($exception) : $exception;

        static::unless($condition, fn() => throw $exception);
    }

    /**
     * Execute the given callback if the given value is falsy.
     *
     */
    public static function unless(mixed $value = null, Closure $callback) : mixed
    {
        return $value ? $value : $callback($value);
    }

    /**
     * Execute the given callback if the given value is truthy.
     *
     */
    public static function when(mixed $value = null, Closure $callback) : mixed
    {
        return $value ? $callback($value) : $value;
    }
}
