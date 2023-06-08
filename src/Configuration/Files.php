<?php

namespace System\Configuration;

use Illuminate\Support\Collection;

class Files
{
    /**
     * Retrieve the list of configuration files.
     *
     */
    public static function get() : Collection
    {
        return Collection::make([
            __DIR__ . '/../../config/auth.php'             => 'auth',
            __DIR__ . '/../../config/broadcasting.php'     => 'broadcasting',
            __DIR__ . '/../../config/cache.php'            => 'cache',
            __DIR__ . '/../../config/clockwork.php'        => 'clockwork',
            __DIR__ . '/../../config/cors.php'             => 'cors',
            __DIR__ . '/../../config/database.php'         => 'database',
            __DIR__ . '/../../config/disposable-email.php' => 'disposable-email',
            __DIR__ . '/../../config/filesystems.php'      => 'filesystems',
            __DIR__ . '/../../config/logging.php'          => 'logging',
            __DIR__ . '/../../config/hashing.php'          => 'hashing',
            __DIR__ . '/../../config/mail.php'             => 'mail',
            __DIR__ . '/../../config/sanctum.php'          => 'sanctum',
            __DIR__ . '/../../config/session.php'          => 'session',
            __DIR__ . '/../../config/queue.php'            => 'queue',
            __DIR__ . '/../../config/vapor.php'            => 'vapor',
            __DIR__ . '/../../config/view.php'             => 'view',
            __DIR__ . '/../../config/ziggy.php'            => 'ziggy',
        ]);
    }
}
