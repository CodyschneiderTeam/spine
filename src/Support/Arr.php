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
     * Transform the given array using the given closure.
     *
     */
    public static function map(array $array, callable $closure) : array
    {
        return array_map($closure, $array);
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
