<?php

namespace System\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Text extends Str
{
    /**
     * Retrieve the base name of the given path.
     *
     */
    public static function basename(string $path) : string
    {
        return basename($path);
    }

    /**
     * Retrieve the base name of the given class or object.
     *
     */
    public static function classBasename(string | object $class) : string
    {
        return class_basename($class);
    }

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
