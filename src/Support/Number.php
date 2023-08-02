<?php

namespace System\Support;

class Number
{
    /**
     * Round the given value to the given precision using the given mode.
     *
     */
    public static function round(int | float $value, int $precision = 0, int $mode = PHP_ROUND_HALF_UP) : float
    {
        return round($value, $precision, $mode);
    }

    /**
     * Round the given value to the given precision using the given mode then cast to an integer.
     *
     */
    public static function roundToInteger(int | float $value, int $precision = 0, int $mode = PHP_ROUND_HALF_UP) : float
    {
        return (int) static::round($value, $precision, $mode);
    }
}
