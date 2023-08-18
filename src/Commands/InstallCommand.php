<?php

namespace System\Commands;

use System\Support\Util;
use System\Foundation\Path;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     */
    protected $description = 'Perform any required installation steps.';

    /**
     * Execute the console command.
     *
     */
    public function handle() : void
    {
        Util::when(App::isProduction(), fn() => $this->production());
        Util::unless(App::isProduction(), fn() => $this->local());

        $this->all();

        $this->info('The installation process is complete.');
    }

    /**
     * Perform any required installation steps for all environments.
     *
     */
    protected function all() : void
    {
        File::ensureDirectoryExists(Path::storage('app/public'));
        File::ensureDirectoryExists(Path::storage('app/private'));

        File::ensureDirectoryExists(Path::storage('framework/logs'));
        File::ensureDirectoryExists(Path::storage('framework/views'));

        File::put(Path::storage('framework/logs/laravel.log'), '');

        Artisan::call('storage:link --force');
    }

    /**
     * Perform any required installation steps for the local environment.
     *
     */
    protected function local() : void
    {
        File::ensureDirectoryExists(Path::storage('framework/dusk/console'));
        File::ensureDirectoryExists(Path::storage('framework/dusk/screenshots'));

        File::ensureDirectoryExists(Path::storage('testing/downloads'));
        File::ensureDirectoryExists(Path::storage('testing/public'));
        File::ensureDirectoryExists(Path::storage('testing/private'));
    }

    /**
     * Perform any required installation steps for the production environment.
     *
     */
    protected function production() : void
    {
        File::ensureDirectoryExists(Path::storage('framework/cache'));
        File::ensureDirectoryExists(Path::storage('framework/sessions'));
    }
}
