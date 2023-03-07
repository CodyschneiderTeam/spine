<?php

namespace Caneara\Spine\Support;

class Is
{
    /**
     * Determine if the given value is an array.
     *
     */
    public static function array(mixed $value) : bool
    {
        return is_array($value);
    }

    /**
     * Determine if the given value is a boolean.
     *
     */
    public static function boolean(mixed $value) : bool
    {
        return is_bool($value);
    }

    /**
     * Determine if the given value is an integer.
     *
     */
    public static function integer(mixed $value) : bool
    {
        return is_int($value);
    }

    /**
     * Determine if the given value is an array.
     *
     */
    public static function notArray(mixed $value) : bool
    {
        return ! static::array($value);
    }

    /**
     * Determine if the given value is a boolean.
     *
     */
    public static function notBoolean(mixed $value) : bool
    {
        return ! static::boolean($value);
    }

    /**
     * Determine if the given value is an integer.
     *
     */
    public static function notInteger(mixed $value) : bool
    {
        return ! static::integer($value);
    }

    /**
     * Determine if the given value is a string.
     *
     */
    public static function notString(mixed $value) : bool
    {
        return ! static::string($value);
    }

    /**
     * Determine if the given value is a string.
     *
     */
    public static function string(mixed $value) : bool
    {
        return is_string($value);
    }
}
