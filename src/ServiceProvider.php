<?php

namespace System;

use System\Support\Util;
use System\Macros\Builder;
use Laravel\Sanctum\Sanctum;
use System\Console\Commands;
use System\Support\Calendar;
use System\Database\Paginator;
use System\Macros\Notification;
use System\Macros\TestResponse;
use System\Storage\LocalDriver;
use System\Database\LazyLoading;
use System\Database\SlowQueries;
use System\Routing\UrlGenerator;
use Illuminate\Support\Facades\App;
use System\Macros\RedirectResponse;
use System\Security\PasswordDefaults;
use System\Database\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider as Provider;
use Illuminate\Pagination\Paginator as BasePaginator;
use System\Configuration\Files as ConfigurationFiles;
use Illuminate\Pagination\LengthAwarePaginator as BaseLengthAwarePaginator;

class ServiceProvider extends Provider
{
    /**
     * Bootstrap any application services.
     *
     */
    public function boot() : void
    {
        PasswordDefaults::enforce();

        $this->commands(Commands::$list);

        App::useLangPath(__DIR__ . '/../resources/lang');

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        Util::when(App::isProduction(), fn() => SlowQueries::setup());
        Util::unless(App::isProduction(), fn() => LocalDriver::setup());
        Util::unless(App::isProduction(), fn() => LazyLoading::setup());

        Builder::register();
        RedirectResponse::register();
        Util::unless(App::isProduction(), fn() => Notification::register());
        Util::unless(App::isProduction(), fn() => TestResponse::register());

        App::bind('url', fn($app) => new UrlGenerator($app['router']->getRoutes(), $app['request']));
    }

    /**
     * Register any application services.
     *
     */
    public function register() : void
    {
        Calendar::useImmutable();

        Commands::register();

        Sanctum::ignoreMigrations();

        App::bind(BasePaginator::class, Paginator::class);
        App::bind(BaseLengthAwarePaginator::class, LengthAwarePaginator::class);

        ConfigurationFiles::get()->each(fn($name, $path) => $this->mergeConfigFrom($path, $name));
    }
}
