<?php

namespace Caneara\Spine\Support;

class Hash
{
    /**
     * Verify whether a hashed string matches an unhashed string.
     *
     */
    public static function equals(mixed $known, mixed $unknown) : string
    {
        return hash_equals((string) $known, (string) $unknown);
    }

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

    /**
     * Calculate the SHA-256 hash of the given value.
     *
     */
    public static function sha256(string $value) : string
    {
        return hash('sha256', $value);
    }
}
