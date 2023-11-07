<?php

namespace System\Http;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Client\PendingRequest;

class Client
{
    /**
     * Create an instance of the HTTP client.
     *
     */
    public static function make() : PendingRequest
    {
        return Http::acceptJson()
            ->timeout(App::isProduction() ? 40 : 0)
            ->withUserAgent(Config::get('app.agent'))
            ->connectTimeout(App::isProduction() ? 20 : 0)
            ->retry(App::isProduction() ? 10 : 0, 5000, null, false);
    }

    /**
     * Create an instance of the HTTP client using the given pool.
     *
     */
    public static function makeUsingPool(Pool &$pool) : PendingRequest
    {
        return $pool->acceptJson()
            ->timeout(App::isProduction() ? 40 : 0)
            ->withUserAgent(Config::get('app.agent'))
            ->connectTimeout(App::isProduction() ? 20 : 0)
            ->retry(App::isProduction() ? 10 : 0, 5000, null, false);
    }
}
