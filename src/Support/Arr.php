<?php

namespace Caneara\Spine\Support;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr as Base;

class Arr extends Base
{
    /**
     * Generate an array of the given length and populate each item using the given closure.
     *
     */
    public static function fill(int $length, Closure $closure) : array
    {
        return Collection::make(array_fill(0, $length, null))
            ->transform(fn() => $closure())
            ->toArray();
    }

    /**
     * Merge the given arrays together.
     *
     */
    public static function filter(array $value, ?callable $callback = null, int $mode = 0) : array
    {
        return static::values(array_filter($value, $callback, $mode));
    }

    /**
     * Determine if the given key is present in the given value.
     *
     */
    public static function in(array $value, mixed $key) : bool
    {
        return in_array($key, $value);
    }

    /**
     * Apply the given callback to the elements of the given arrays.
     *
     */
    public static function map(array $value, ?callable $callback = null, array ...$arrays) : array
    {
        return array_map($callback, $value, $arrays);
    }

    /**
     * Merge the given arrays together.
     *
     */
    public static function merge(array ...$arrays) : array
    {
        return array_merge(...$arrays);
    }

    /**
     * Determine if the given key is not present in the given value.
     *
     */
    public static function notIn(array $value, mixed $key) : bool
    {
        return ! static::in($value, $key);
    }

    /**
     * Remove the given key from the given value.
     *
     */
    public static function remove(array $value, string $key) : array
    {
        if (static::exists($value, $key)) {
            unset($value[$key]);
        }

        return $value;
    }

    /**
     * Replaces elements from the passed arrays into the first array recursively.
     *
     */
    public static function replaceRecursive(array $value, array ...$replacements) : array
    {
        return array_replace_recursive($value, ...$replacements);
    }

    /**
     * Create an array by splitting the given value.
     *
     */
    public static function split(string $separator, string $value) : array
    {
        return explode($separator, $value);
    }

    /**
     * Retrieve and sort all of the elements in the given value.
     *
     */
    public static function values(array $value) : array
    {
        return array_values($value);
    }
}
