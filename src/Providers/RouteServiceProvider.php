<?php

namespace System\Providers;

use System\Support\Text;
use System\Foundation\Path;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     */
    public function boot() : void
    {
        //
    }

    /**
     * Retrieve the home route for the application.
     *
     */
    public static function home() : string
    {
        return Config::get('routing.home') ?? (Route::exists('home') ? 'home' : 'dashboard');
    }

    /**
     * Register the application routes.
     *
     */
    public function map() : void
    {
        Collection::make(File::allFiles(Path::app('Routes')))
            ->map(fn($item) => [$item->getPathname(), $item->getRelativePath()])
            ->map(fn($item) => [$item[0], $item[1] === 'None' ? [] : Text::lower($item[1])])
            ->each(fn($item) => Route::middleware($item[1])->group($item[0]));
    }
}
