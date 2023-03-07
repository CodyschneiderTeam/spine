<?php

namespace Caneara\Spine\Routing;

use Illuminate\Support\Facades\Route;
use Caneara\Spine\Controllers\PollController;

class PollRoutes
{
    /**
     * Assign the routes to the router.
     *
     */
    public static function register() : void
    {
        Route::get('/poll/{key}', [PollController::class, 'index'])
            ->name('poll')
            ->middleware('web');
    }
}
