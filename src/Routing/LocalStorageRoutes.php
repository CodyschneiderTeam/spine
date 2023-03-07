<?php

namespace Caneara\Spine\Routing;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Caneara\Spine\Controllers\LocalStorageController;

class LocalStorageRoutes
{
    /**
     * Assign the routes to the router.
     *
     */
    public static function register() : void
    {
        if (App::isProduction()) {
            return;
        }

        Route::post('/vapor/signed-storage-url', [LocalStorageController::class, 'create'])
            ->name('signed.storage.url')
            ->middleware('web');

        Route::put('/vapor/signed-storage-upload/{id}', [LocalStorageController::class, 'store'])
            ->name('signed.storage.upload')
            ->middleware('web', 'signed');
    }
}
