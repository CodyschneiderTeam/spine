<?php

namespace System\Storage;

use System\Support\Text;
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
        $url = function($path, $file) {
            return Storage::download(
                Text::of(Storage::path($path))->after(App::storagePath())->after('app/')->after('testing/')->toString(),
                Text::of($file)->after('="')->beforeLast('"')->toString()
            );
        };

        Storage::buildTemporaryUrlsUsing(function($path, $expires, $options) use ($url) {
            return $url($path, $options['ResponseContentDisposition']);
        });
    }
}
