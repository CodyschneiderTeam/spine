<?php

namespace Caneara\Spine\Storage;

use Caneara\Spine\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class LocalDriver
{
    /**
     * Extend the local storage driver.
     *
     */
    public static function setup() : void
    {
        if (App::isProduction()) {
            return;
        }

        $url = function($path, $file) {
            return Storage::download(
                Str::of(Storage::path($path))->after(App::storagePath())->after('app/')->after('testing/')->toString(),
                Str::of($file)->after('="')->beforeLast('"')->toString()
            );
        };

        Storage::buildTemporaryUrlsUsing(function($path, $expires, $options) use ($url) {
            return $url($path, $options['ResponseContentDisposition']);
        });
    }
}
