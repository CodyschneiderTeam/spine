<?php

namespace System\Testing\Fakes;

use System\Support\Text;
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
    public static function fake(string $id, string $disk, string $path, string $format, bool $extension) : void
    {
        Storage::disk($disk)->makeDirectory($path);

        $path = Text::of("testing/{$disk}/{$path}/{$id}")
            ->append($extension ? static::$formats[$format] : '')
            ->pipe(fn($path) => App::storagePath($path))
            ->toString();

        "image{$format}"(imagecreatetruecolor(10, 10), $path);
    }
}
