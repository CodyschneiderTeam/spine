<?php

namespace System\Testing\Fakes;

use System\Support\Text;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;

class Avatar
{
    use WithFaker;

    /**
     * Retrieve and assign an avatar using the given gender.
     *
     */
    public static function fake(string $gender) : ?string
    {
        if (App::runningUnitTests() || Env::get('APP_DUSK', false)) {
            return null;
        }

        Storage::put(
            static::getPath($id = Text::uuid()),
            static::getRandomImage($gender)
        );

        return $id;
    }

    /**
     * Generate the complete path to use for the avatar.
     *
     */
    protected static function getPath(string $id) : string
    {
        return Text::of('images/avatars/')
            ->append(static::getResourceType())
            ->append("/{$id}.jpg")
            ->toString();
    }

    /**
     * Retrieve the contents of a random image with the given gender.
     *
     */
    protected static function getRandomImage(string $gender) : string
    {
        $directory = "/../../../resources/images/avatars/{$gender}/";

        $index = (new static())->faker()->numberBetween(1, 50);

        return File::get(realpath(__DIR__ . "{$directory}/{$index}/.jpg"));
    }

    /**
     * Retrieve the resource type that should be used by the path.
     *
     */
    protected static function getResourceType() : string
    {
        return Text::of(debug_backtrace()[2]['file'])
            ->classBasename()
            ->before('.php')
            ->before('Factory')
            ->plural()
            ->lower()
            ->toString();
    }
}
