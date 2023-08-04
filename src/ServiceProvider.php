<?php

namespace System;

use System\Support\Util;
use System\Framework\Path;
use System\Macros\Builder;
use Laravel\Sanctum\Sanctum;
use System\Console\Commands;
use System\Support\Calendar;
use System\Database\Paginator;
use System\Macros\Notification;
use System\Macros\TestResponse;
use System\Database\LazyLoading;
use System\Database\SlowQueries;
use System\Routing\UrlGenerator;
use Illuminate\Support\Facades\App;
use System\Macros\RedirectResponse;
use Illuminate\Support\Facades\View;
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
        Builder::register();
        PasswordDefaults::enforce();
        RedirectResponse::register();

        App::useLangPath(__DIR__ . '/../resources/lang');

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        Util::when(App::isProduction(), fn() => SlowQueries::setup());
        Util::unless(App::isProduction(), fn() => LazyLoading::setup());
        Util::unless(App::isProduction(), fn() => Notification::register());
        Util::unless(App::isProduction(), fn() => TestResponse::register());

        App::bind('url', fn($app) => new UrlGenerator($app['router']->getRoutes(), $app['request']));

        View::addNamespace('mail', Path::base('vendor/caneara/spine/resources/views/vendor/mail/html'));
    }

    /**
     * Register any application services.
     *
     */
    public function register() : void
    {
        Commands::register();
        Calendar::useImmutable();
        Sanctum::ignoreMigrations();

        App::bind(BasePaginator::class, Paginator::class);
        App::bind(BaseLengthAwarePaginator::class, LengthAwarePaginator::class);

        ConfigurationFiles::get()->each(fn($name, $path) => $this->mergeConfigFrom($path, $name));
    }
}
