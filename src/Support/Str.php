<?php

namespace Caneara\Spine\Support;

use Illuminate\Support\Str as Base;

class Str extends Base
{
    /**
     * Retrieve the base name of the given class or object.
     *
     */
    public static function basename(string | object $value) : string
    {
        return class_basename($value);
    }

    /**
     * Get a new stringable object from the given string.
     *
     */
    public static function of($string) : FluentString
    {
        return new FluentString($string);
    }

    /**
     * Strip whitespace (or other characters) from the given value.
     *
     */
    public static function trim(string $value, string $characters = " \n\r\t\v\x00") : string
    {
        return trim($value, $characters);
    }
}
