<?php

namespace System\Console;

use System\Commands\BackupCommand;
use Illuminate\Support\Facades\App;
use System\Commands\MakeModelCommand;
use System\Commands\MakeFactoryCommand;
use Illuminate\Console\Application as Artisan;
use Illuminate\Database\Migrations\MigrationCreator;

class Commands
{
    /**
     * Register the commands.
     *
     */
    public static function register() : void
    {
        Artisan::starting(function($artisan) {
            $artisan->resolveCommands([BackupCommand::class]);
        });

        App::extend('command.make.model', fn() => new MakeModelCommand());
        App::extend('command.make.factory', fn() => new MakeFactoryCommand());

        App::extend('migration.creator', function($creator, $app) {
            return new MigrationCreator($app['files'], __DIR__ . '/../../stubs');
        });
    }
}
