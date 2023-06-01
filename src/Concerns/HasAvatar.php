<?php

namespace System\Concerns;

use System\Support\Text;

trait HasAvatar
{
    /**
     * Generate the relative path to the avatar.
     *
     */
    public function avatarPath() : string
    {
        $directory = Text::of($this)
            ->classBasename()
            ->lower()
            ->plural()
            ->toString();

        return "images/avatars/{$directory}/{$this->avatar}.jpg";
    }
}
