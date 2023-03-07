<?php

namespace Caneara\Spine\Controllers;

use Caneara\Spine\Support\Poll;
use Illuminate\Http\JsonResponse;
use Caneara\Spine\Types\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;

class PollController extends Controller
{
    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Fetch the latest update for the given key.
     *
     */
    public function index(string $key) : JsonResponse
    {
        return ($content = Poll::get($key, Auth::user()))
            ? Response::json($content, HttpResponse::HTTP_OK)
            : Response::json(null, HttpResponse::HTTP_NOT_FOUND);
    }
}
