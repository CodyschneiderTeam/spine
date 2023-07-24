<?php

namespace System\Backup;

use Illuminate\Container\Container;
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
            ->path(Container::getInstance()->storagePath())
            ->run('rm database.sql; rm files.zip');
    }
}
