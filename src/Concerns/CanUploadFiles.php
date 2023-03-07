<?php

namespace Caneara\Spine\Concerns;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\RateLimiter;

trait CanUploadFiles
{
    /**
     * Determine whether the given user can upload files.
     *
     */
    public function uploadFiles(Model $user) : bool
    {
        $key = "upload-files:{$user->id}";

        if (! RateLimiter::attempt($key, 20, fn() => true)) {
            App::abort(Response::HTTP_TOO_MANY_REQUESTS);
        }

        return true;
    }
}
