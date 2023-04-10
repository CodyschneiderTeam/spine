<?php

namespace Caneara\Spine;

use Laravel\Sanctum\Sanctum;
use Caneara\Spine\Macros\Builder;
use Caneara\Spine\Console\Commands;
use Caneara\Spine\Support\DateTime;
use Illuminate\Support\Facades\App;
use Caneara\Spine\Database\Paginator;
use Caneara\Spine\Macros\Notification;
use Caneara\Spine\Macros\TestResponse;
use Caneara\Spine\Storage\LocalDriver;
use Caneara\Spine\Database\LazyLoading;
use Caneara\Spine\Database\SlowQueries;
use Caneara\Spine\Macros\RedirectResponse;
use Caneara\Spine\Security\PasswordDefaults;
use Caneara\Spine\Database\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider as Provider;
use Illuminate\Pagination\Paginator as BasePaginator;
use Caneara\Spine\Configuration\Files as ConfigurationFiles;
use Illuminate\Pagination\LengthAwarePaginator as BaseLengthAwarePaginator;

class ServiceProvider extends Provider
{
    /**
     * Bootstrap any application services.
     *
     */
    public function boot() : void
    {
        $this->macros();
        $this->storage();
        $this->database();
        $this->security();

        $this->commands(Commands::$list);

        App::useLangPath(__DIR__ . '/../resources/lang');

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    /**
     * Retrieve and merge the configuration files.
     *
     */
    protected function configuration() : void
    {
        ConfigurationFiles::get()->each(function($name, $path) {
            $this->mergeConfigFrom($path, $name);
        });
    }

    /**
     * Apply the database provisions.
     *
     */
    protected function database() : void
    {
        LazyLoading::setup();
        SlowQueries::setup();
    }

    /**
     * Register the macros with each of their facades.
     *
     */
    protected function macros() : void
    {
        Builder::register();
        Notification::register();
        TestResponse::register();
        RedirectResponse::register();
    }

    /**
     * Register any application services.
     *
     */
    public function register() : void
    {
        Commands::register();

        $this->configuration();

        DateTime::useImmutable();

        Sanctum::ignoreMigrations();

        App::bind(BasePaginator::class, Paginator::class);
        App::bind(BaseLengthAwarePaginator::class, LengthAwarePaginator::class);
    }

    /**
     * Apply the security provisions.
     *
     */
    protected function security() : void
    {
        PasswordDefaults::enforce();
    }

    /**
     * Apply the storage provisions.
     *
     */
    protected function storage() : void
    {
        LocalDriver::setup();
    }
}
