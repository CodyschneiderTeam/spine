<?php

namespace System\Middleware;

use Inertia\Middleware;
use System\Support\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
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
        $defaults = [
            'csrf'          => Session::token(),
            'asset'         => URL::asset(''),
            'file'          => Storage::url(''),
            'guest'         => Auth::guest(),
            'creator'       => Config::get('app.company', Config::get('app.name')),
            'data'          => fn() => Util::rescue(fn() => Session::get('data'), []),
            'message'       => fn() => Util::rescue(fn() => Session::get('message')),
            'impersonation' => fn() => Util::rescue(fn() => Session::get('impersonation')),
        ];

        return Collection::make(parent::share($request))
            ->merge($defaults)
            ->merge($this->send())
            ->toArray();
    }
}
