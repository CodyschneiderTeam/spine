<?php

namespace Caneara\Spine\Support;

class Hash
{
    /**
     * Calculate the MD-5 hash of the given value.
     *
     */
    public static function md5(string $value, bool $binary = false) : string
    {
        return md5($value, $binary);
    }

    /**
     * Calculate the SHA-1 hash of the given value.
     *
     */
    public static function sha1(string $value, bool $binary = false) : string
    {
        return sha1($value, $binary);
    }
}
