<?php

namespace Caneara\Spine\Support;

use Illuminate\Support\Str as Base;

class Str extends Base
{
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
