<?php

namespace System\Commands;

use System\Foundation\Path;
use Illuminate\Console\Command;
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
    protected $description = 'Perform Laravel post-deployment installation steps.';

    /**
     * Execute the console command.
     *
     */
    public function handle() : void
    {
        File::ensureDirectoryExists(Path::storage('app/public'));
        File::ensureDirectoryExists(Path::storage('app/private'));
        File::ensureDirectoryExists(Path::storage('framework/cache'));
        File::ensureDirectoryExists(Path::storage('framework/clockwork'));
        File::ensureDirectoryExists(Path::storage('framework/dusk/console'));
        File::ensureDirectoryExists(Path::storage('framework/dusk/screenshots'));
        File::ensureDirectoryExists(Path::storage('framework/sessions'));
        File::ensureDirectoryExists(Path::storage('framework/testing/downloads'));
        File::ensureDirectoryExists(Path::storage('framework/testing/public'));
        File::ensureDirectoryExists(Path::storage('framework/testing/private'));
        File::ensureDirectoryExists(Path::storage('framework/views'));

        Artisan::call('storage:link');

        $this->info('The installation process is complete.');
    }
}
