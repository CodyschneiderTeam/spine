<?php

namespace System\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Text extends Str
{
    /**
     * Create a fluent string using the given string.
     *
     */
    public static function of(mixed $string) : Stringable
    {
        $payload = Is::string($string) ? $string : get_class($string);

        return new Stringable($payload);
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
