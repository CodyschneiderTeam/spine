<?php

namespace System\Rules;

use System\Types\Rule;
use System\Support\Util;
use System\Support\Regex;

class LatitudeLongitudeRule extends Rule
{
    /**
     * The error message to use.
     *
     */
    protected string $message = 'The :attribute must be valid and use 5 decimal places e.g. -77.03643,38.89515';

    /**
     * Determine if the validation rule passes.
     *
     */
    public function passes($value) : bool
    {
        $latitude  = '[-]?((([0-8]?[0-9])(\.(\d{5}))?)|(90(\.0+)?))';
        $longitude = '[-]?((((1[0-7][0-9])|([0-9]?[0-9]))(\.(\d{5}))?)|180(\.0+)?)';

        return Util::filled(Regex::match("/^{$latitude},\s?{$longitude}$/", $value));
    }
}
