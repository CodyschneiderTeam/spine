<?php

namespace Caneara\Spine\Controllers;

use Caneara\Spine\Support\Str;
use Illuminate\Http\JsonResponse;
use Caneara\Spine\Support\DateTime;
use Caneara\Spine\Types\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class LocalStorageController extends Controller
{
    /**
     * Generate a signed URL for file uploading.
     *
     */
    public function create() : JsonResponse
    {
        Gate::authorize('uploadFiles', [Auth::user()]);

        $url = URL::temporarySignedRoute(
            'signed.storage.upload',
            DateTime::now()->addHour(),
            ['id' => $id = Str::uuid()]
        );

        return Response::json([
            'uuid'    => $id,
            'headers' => compact('id'),
            'url'     => $url,
        ]);
    }

    /**
     * Persist the request's content to the storage disk.
     *
     */
    public function store() : JsonResponse
    {
        Gate::authorize('uploadFiles', [Auth::user()]);

        Storage::put('tmp/' . Request::header('id'), Request::getContent());

        return Response::json('The file was uploaded');
    }
}
