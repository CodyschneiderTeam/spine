<?php

namespace Caneara\Spine\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Caneara\Spine\Routing\PollRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
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
        $this->rateLimiting();

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

    /**
     * Configure the default rate limits for the API.
     *
     */
    protected function rateLimiting() : void
    {
        RateLimiter::for('api', function(Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
