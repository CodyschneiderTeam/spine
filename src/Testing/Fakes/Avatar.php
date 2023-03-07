<?php

namespace Caneara\Spine\Testing\Fakes;

use Illuminate\Support\Env;
use Caneara\Spine\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Avatar
{
    /**
     * Retrieve and assign an avatar using the given gender.
     *
     */
    public static function fake(string $gender) : ?string
    {
        if (static::shouldSkip()) {
            return null;
        }

        Storage::put(
            static::getPath($id = Str::uuid()),
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
        return Str::of('images/avatars/')
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

        return File::get(realpath(__DIR__ . $directory . rand(1, 50) . '.jpg'));
    }

    /**
     * Retrieve the resource type that should be used by the path.
     *
     */
    protected static function getResourceType() : string
    {
        return Str::of(class_basename(debug_backtrace()[2]['file']))
            ->before('.php')
            ->before('Factory')
            ->plural()
            ->lower()
            ->toString();
    }

    /**
     * Determine whether the process should be abandoned.
     *
     */
    protected static function shouldSkip() : bool
    {
        return App::runningUnitTests() || Env::get('APP_DUSK', false);
    }
}
