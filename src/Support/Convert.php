<?php

namespace System\Support;

class Convert
{
    /**
     * Convert the given value to an float.
     *
     */
    public static function float(mixed $value) : float
    {
        return floatval($value);
    }

    /**
     * Convert the given value to an integer.
     *
     */
    public static function integer(mixed $value) : int
    {
        return intval($value);
    }

    /**
     * Convert the given value to an string.
     *
     */
    public static function string(mixed $value) : string
    {
        return (string) $value;
    }
}
