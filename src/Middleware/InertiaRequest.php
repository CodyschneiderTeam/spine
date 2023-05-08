<?php

namespace Caneara\Spine\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Caneara\Spine\Support\Arr;
use Caneara\Spine\Support\Util;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InertiaRequest extends Middleware
{
    /**
     * The root template.
     *
     */
    protected $rootView = 'app.index';

    /**
     * Define the properties that are shared by default.
     *
     */
    public function share(Request $request) : array
    {
        return Arr::merge(parent::share($request), [
            'csrf'          => Session::token(),
            'asset'         => URL::asset(''),
            'file'          => Storage::url(''),
            'guest'         => Auth::guest(),
            'data'          => fn() => Util::rescue(fn() => Session::get('data'), []),
            'notification'  => fn() => Util::rescue(fn() => Session::get('notification')),
            'impersonation' => fn() => Util::rescue(fn() => Session::get('impersonation')),
        ], $this->send());
    }
}
