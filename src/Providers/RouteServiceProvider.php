<?php

namespace Caneara\Spine\Providers;

use Illuminate\Support\Facades\App;
use Caneara\Spine\Routing\PollRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Caneara\Spine\Routing\LocalStorageRoutes;
use Caneara\Spine\Routing\ImpersonationRoutes;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     */
    public function boot() : void
    {
        PollRoutes::register();
        LocalStorageRoutes::register();
        ImpersonationRoutes::register();
    }

    /**
     * Register the application routes.
     *
     */
    public function map() : void
    {
        foreach (Config::get('routing.middleware') as $middleware => $files) {
            foreach ($files as $file) {
                Route::middleware($middleware)->group(
                    App::basePath("routes/{$middleware}/{$file}.php")
                );
            }
        }
    }
}
