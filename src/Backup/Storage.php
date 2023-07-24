<?php

namespace System\Backup;

use System\Support\Text;
use System\Support\Util;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Process;

class Storage
{
    /**
     * Generate the shell command to backup the storage directory.
     *
     */
    protected static function command() : string
    {
        return Text::of('zip -r ' . Container::getInstance()->storagePath('files.zip'))
            ->append(' ' . Container::getInstance()->storagePath('app'))
            ->toString();
    }

    /**
     * Archive the storage directory as a ZIP file.
     *
     */
    public static function execute() : void
    {
        $result = Process::timeout(3600)
            ->path(Container::getInstance()->storagePath())
            ->run(static::command());

        Util::when($result->failed(), fn() => Purge::execute());
    }
}
