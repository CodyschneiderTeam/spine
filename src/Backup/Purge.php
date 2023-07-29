<?php

namespace System\Backup;

use System\Container\Path;
use Illuminate\Support\Facades\Process;

class Purge
{
    /**
     * Remove all temporary files.
     *
     */
    public static function execute() : void
    {
        Process::timeout(600)
            ->path(Path::storage())
            ->run('rm database.sql; rm files.zip');
    }
}
