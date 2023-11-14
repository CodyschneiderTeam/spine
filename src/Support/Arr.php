<?php

namespace System\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr as Base;

class Arr extends Base
{
    /**
     * Retrieve the total number of items in the given array.
     *
     */
    public static function count(array $array) : int
    {
        return count($array);
    }

    /**
     * Determine if the given value is in the array.
     *
     */
    public static function contains(mixed $value, array $array, bool $strict = false) : bool
    {
        return in_array($value, $array, $strict);
    }

    /**
     * Determine if the given value is not in the array.
     *
     */
    public static function doesntContain(mixed $value, array $array, bool $strict = false) : bool
    {
        return ! static::contains($value, $array, $strict);
    }

    /**
     * Iterate over the given array and pass each item to the given closure.
     *
     */
    public static function each(array $array, callable $closure) : void
    {
        foreach ($array as $key => $item) {
            if ($closure($item, $key) === false) {
                break;
            }
        }
    }

    /**
     * Create an array of the given size and set each item to the given value.
     *
     */
    public static function fill(int $count, mixed $value = null, int $start = 0) : array
    {
        return array_fill($start, $count, $value);
    }

    /**
     * Pass each item in the given array through the given closure.
     *
     */
    public static function filter(array $array, callable $closure = null, int $mode = 0) : array
    {
        return array_filter($array, $closure, $mode);
    }

    /**
     * Retrieve all the keys or a subset of the keys of in the given array.
     *
     */
    public static function keys(array $array, mixed $filter = null, bool $strict = false) : array
    {
        return Is::null($filter) ? array_keys($array) : array_keys($array, $filter, $strict);
    }

    /**
     * Transform the given array using the given closure.
     *
     */
    public static function map(array $array, callable $closure) : array
    {
        return array_map($closure, $array);
    }

    /**
     * Merge the given payload into the given array.
     *
     */
    public static function merge(array $array, array $payload) : array
    {
        return array_merge($array, $payload);
    }

    /**
     * Pad the given array to the given length using the given value.
     *
     */
    public static function pad(array $array, int $length, mixed $value = null) : array
    {
        return array_pad($array, $length, $value);
    }

    /**
     * Reverse the content of the given array.
     *
     */
    public static function reverse(array $array, bool $preserve_keys = true) : array
    {
        return array_reverse($array, $preserve_keys);
    }

    /**
     * Extract a slice of elements from the given array.
     *
     */
    public static function slice(array $array, int $offset, int $length = null, bool $preserve_keys = true) : array
    {
        return array_slice($array, $offset, $length, $preserve_keys);
    }

    /**
     * Split the given string value into array items using the given separator.
     *
     */
    public static function split(string $value, string $separator = ',', int $limit = null) : array
    {
        return Is::null($limit) ? explode($separator, $value) : explode($separator, $value, $limit);
    }

    /**
     * Convert the given array into a collection.
     *
     */
    public static function toCollection(array $array) : Collection
    {
        return Collection::make($array);
    }

    /**
     * Retrieve all the values in the given array.
     *
     */
    public static function values(array $array) : array
    {
        return array_values($array);
    }
}
