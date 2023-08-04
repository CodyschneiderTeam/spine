<?php

namespace System\Backup;

use System\Support\Text;
use System\Support\Util;
use System\Foundation\Path;
use System\Support\Calendar;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Process;

class Upload
{
    /**
     * Generate the shell command to upload the archived files.
     *
     */
    protected static function command() : string
    {
        $stamp = Calendar::now()->format('Y-m-d-H-i-s');

        return Text::of('aws s3 cp database.sql')
            ->append(' s3://' . Config::get("filesystems.disks.backup.bucket") . "/{$stamp}/database.sql;")
            ->append('aws s3 cp files.zip')
            ->append(' s3://' . Config::get("filesystems.disks.backup.bucket") . "/{$stamp}/files.zip")
            ->toString();
    }

    /**
     * Dump the database to a file.
     *
     */
    public static function execute() : void
    {
        $result = Process::timeout(3600)
            ->path(Path::storage())
            ->run(static::command());

        Util::when($result->failed(), fn() => Purge::execute());
    }
}
