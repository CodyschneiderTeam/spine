<?php

namespace System\Routing;

use Illuminate\Support\Facades\Route;
use System\Controllers\ImpersonationController;

class ImpersonationRoutes
{
    /**
     * Assign the routes to the router.
     *
     */
    public static function register() : void
    {
        Route::delete('/administration/impersonation/delete', [ImpersonationController::class, 'delete'])
            ->name('administration.impersonation.delete')
            ->middleware('web');

        Route::post('/administration/impersonation/{id}', [ImpersonationController::class, 'store'])
            ->name('administration.impersonation.store')
            ->middleware('web');
    }
}
