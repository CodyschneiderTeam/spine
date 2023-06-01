<?php

namespace System\Routing;

use Illuminate\Support\Facades\Route;
use System\Controllers\LocalStorageController;

class LocalStorageRoutes
{
    /**
     * Assign the routes to the router.
     *
     */
    public static function register() : void
    {
        Route::post('/vapor/signed-storage-url', [LocalStorageController::class, 'create'])
            ->name('signed.storage.url')
            ->middleware('web');

        Route::put('/vapor/signed-storage-upload/{id}', [LocalStorageController::class, 'store'])
            ->name('signed.storage.upload')
            ->middleware('web', 'signed');
    }
}
