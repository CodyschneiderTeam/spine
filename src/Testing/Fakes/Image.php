<?php

namespace Caneara\Spine\Testing\Fakes;

use Caneara\Spine\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Image
{
    /**
     * The map of file formats to extensions.
     *
     */
    protected static array $formats = [
        'png'  => '.png',
        'jpeg' => '.jpg',
    ];

    /**
     * Create a dummy image using the given parameters.
     *
     */
    public static function fake(string $id, string $path, string $format, bool $extension) : void
    {
        Storage::makeDirectory($path);

        $path = Str::of("framework/testing/{$path}/{$id}")
            ->append($extension ? static::$formats[$format] : '')
            ->pipe(fn($path) => App::storagePath($path))
            ->toString();

        "image{$format}"(imagecreatetruecolor(10, 10), $path);
    }
}
