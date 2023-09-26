<?php

namespace System\Enums;

use System\Types\Enum;

enum HttpStatusCodes : int
{
    use Enum;

    /**
     * The available cases.
     *
     */
    case SUCCESSFUL             = 200;
    case BAD_REQUEST            = 400;
    case UNAUTHORIZED           = 401;
    case PAYMENT_REQUIRED       = 402;
    case FORBIDDEN              = 403;
    case NOT_FOUND              = 404;
    case METHOD_NOW_ALLOWED     = 405;
    case NOT_ACCEPTABLE         = 406;
    case REQUEST_TIMEOUT        = 408;
    case I_AM_A_TEAPOT          = 418;
    case TOO_MANY_REQUESTS      = 429;
    case INTERNAL_SERVER_ERROR  = 500;
    case SERVER_BAD_GATEWAY     = 502;
    case SERVER_UNAVAILABLE     = 503;
    case SERVER_GATEWAY_TIMEOUT = 504;
    case UNKNOWN_ERROR          = 510;

    /**
     * Retrieve the available cases as an array.
     *
     */
    public static function toArray() : array
    {
        return [[
            'id'    => static::SUCCESSFUL,
            'label' => 'Successful',
        ], [
            'id'    => static::BAD_REQUEST,
            'label' => 'Bad request',
        ], [
            'id'    => static::UNAUTHORIZED,
            'label' => 'Unauthorized',
        ], [
            'id'    => static::PAYMENT_REQUIRED,
            'label' => 'Payment required',
        ], [
            'id'    => static::FORBIDDEN,
            'label' => 'Forbidden',
        ], [
            'id'    => static::NOT_FOUND,
            'label' => 'Not found',
        ], [
            'id'    => static::METHOD_NOW_ALLOWED,
            'label' => 'Method now allowed',
        ], [
            'id'    => static::NOT_ACCEPTABLE,
            'label' => 'Not acceptable',
        ], [
            'id'    => static::REQUEST_TIMEOUT,
            'label' => 'Request timeout',
        ], [
            'id'    => static::I_AM_A_TEAPOT,
            'label' => 'I am a teapot',
        ], [
            'id'    => static::TOO_MANY_REQUESTS,
            'label' => 'Too many requests',
        ], [
            'id'    => static::INTERNAL_SERVER_ERROR,
            'label' => 'Internal server error',
        ], [
            'id'    => static::SERVER_BAD_GATEWAY,
            'label' => 'Server bad gateway',
        ], [
            'id'    => static::SERVER_UNAVAILABLE,
            'label' => 'Server unavailable',
        ], [
            'id'    => static::SERVER_GATEWAY_TIMEOUT,
            'label' => 'Server gateway timeout',
        ], [
            'id'    => static::UNKNOWN_ERROR,
            'label' => 'Unknown error',
        ]];
    }
}
