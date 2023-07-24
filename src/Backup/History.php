<?php

namespace System\Backup;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class History
{
    /**
     * Remove the oldest backup when there are more than thirty.
     *
     */
    public static function execute() : void
    {
        $backups = Collection::make(Storage::disk('backup')->directories())
            ->sort()
            ->values();

        if ($backups->count() >= 31) {
            Storage::disk('backup')->deleteDirectory($backups->first());
        }
    }
}
