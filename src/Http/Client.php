<?php

namespace Caneara\Spine\Http;

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
            ->withOptions(['connect_timeout' => 20])
            ->withUserAgent(Config::get('app.agent'))
            ->retry(App::isProduction() ? 10 : 0, 5000, null, false);
    }
}
