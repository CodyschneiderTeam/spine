<?php

namespace System\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr as Base;

class Arr extends Base
{
    /**
     * Determine if the given value is in the array.
     *
     */
    public static function contains(mixed $value, array $array) : bool
    {
        return in_array($value, $array, true);
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
     * Convert the given array into a collection.
     *
     */
    public static function toCollection(array $array) : Collection
    {
        return Collection::make($array);
    }
}
