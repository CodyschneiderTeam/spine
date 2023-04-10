<?php

namespace Caneara\Spine\Concerns;

use Caneara\Spine\Support\Str;

trait HasAvatar
{
    /**
     * Generate the relative path to the avatar.
     *
     */
    public function avatarPath() : string
    {
        $directory = Str::of(class_basename($this))
            ->lower()
            ->plural()
            ->toString();

        return "images/avatars/{$directory}/{$this->avatar}.jpg";
    }
}
