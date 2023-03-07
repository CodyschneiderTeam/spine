<?php

namespace Caneara\Spine\Console;

use Illuminate\Support\Facades\App;
use Caneara\Spine\Commands\MakeModelCommand;
use Caneara\Spine\Commands\MakeFactoryCommand;
use Illuminate\Database\Migrations\MigrationCreator;

class Commands
{
    /**
     * List of console commands.
     *
     */
    public static array $list = [
        MakeModelCommand::class,
        MakeFactoryCommand::class,
    ];

    /**
     * Register the commands.
     *
     */
    public static function register() : void
    {
        App::extend('command.make.model', fn() => new MakeModelCommand());
        App::extend('command.make.factory', fn() => new MakeFactoryCommand());

        App::extend('migration.creator', function($creator, $app) {
            return new MigrationCreator($app['files'], __DIR__ . '/../../stubs');
        });
    }
}
