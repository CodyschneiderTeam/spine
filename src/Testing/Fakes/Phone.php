<?php

namespace System\Testing\Fakes;

use System\Support\Arr;

class Phone
{
    /**
     * The list of fake numbers.
     *
     */
    protected static array $numbers = [
        '+12069536978',
        '+13028299743',
        '+12104978372',
        '+13052816567',
        '+447158656473',
        '+447777600498',
        '+447457500615',
        '+447494895188',
        '+353822201581',
        '+353834237798',
        '+353889105586',
        '+353822217084',
    ];

    /**
     * Retrieve a random, but valid phone number.
     *
     */
    public static function fake() : string
    {
        return Arr::random(static::$numbers);
    }
}
