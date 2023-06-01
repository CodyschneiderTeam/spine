<?php

namespace System\Support;

class Json
{
    /**
     * Decode the given JSON value into an associative array.
     *
     */
    public static function decode(string $value) : array
    {
        return json_decode($value, true);
    }

    /**
     * Encode the given value as JSON.
     *
     */
    public static function encode(mixed $value) : string
    {
        return json_encode($value);
    }

    /**
     * Determine if the given value is valid JSON.
     *
     */
    public static function valid(string $value) : bool
    {
        return Text::isJson($value);
    }
}
