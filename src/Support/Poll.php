<?php

namespace Caneara\Spine\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Auth\Authenticatable;

class Poll
{
    /**
     * Retrieve the latest update for the given key.
     *
     */
    public static function get(string $key, Authenticatable $model) : mixed
    {
        return Cache::get("poll-{$model->id}-{$key}");
    }

    /**
     * Assign the given payload to the given key.
     *
     */
    public static function set(string $key, Authenticatable $model, array $payload) : void
    {
        Cache::put(
            "poll-{$model->id}-{$key}",
            $payload,
            DateTime::now()->addMinute(),
        );
    }
}
