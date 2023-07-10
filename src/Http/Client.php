<?php

namespace System\Http;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class Client
{
    /**
     * Configure the HTTP client.
     *
     */
    public static function configure() : void
    {
        Http::globalRequestMiddleware(function($request) {
            return $request->acceptJson()
                ->withUserAgent(Config::get('app.agent'))
                ->timeout(App::isProduction() ? 40 : 0)
                ->connectTimeout(App::isProduction() ? 20 : 0)
                ->retry(App::isProduction() ? 10 : 0, 5000, null, false);
        });
    }
}
