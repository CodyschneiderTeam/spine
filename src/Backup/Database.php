<?php

namespace System\Backup;

use System\Support\Text;
use System\Support\Util;
use System\Container\Path;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Process;

class Database
{
    /**
     * Generate the shell command to backup the database.
     *
     */
    protected static function command() : string
    {
        return Text::of('mysqldump --single-transaction --skip-lock-tables')
            ->append(' -u ' . Config::get('database.connections.mysql.username'))
            ->append(' -h ' . Config::get('database.connections.mysql.host'))
            ->append(' ' . Config::get('database.connections.mysql.database') . ' > database.sql')
            ->when(Config::get('database.connections.mysql.password'), function($text) {
                return $text->append(' -p' . Config::get('database.connections.mysql.password'));
            })
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
