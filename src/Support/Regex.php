<?php

namespace Caneara\Spine\Support;

class Regex
{
    /**
     * Perform a regular expression match using the given pattern.
     *
     */
    public static function match(string $pattern, string $value) : array
    {
        preg_match($pattern, $value, $matches);

        return $matches;
    }
}
