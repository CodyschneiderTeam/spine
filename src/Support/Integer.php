<?php

namespace Caneara\Spine\Support;

class Integer
{
    /**
     * Generate a random number between the given thresholds.
     *
     */
    public static function random(int $min = 1, int $max = 1000) : string
    {
        return random_int($min, $max);
    }
}
