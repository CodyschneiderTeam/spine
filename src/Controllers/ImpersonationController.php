<?php

namespace System\Controllers;

use System\Types\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ImpersonationController extends Controller
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
     * Stop impersonating the current user.
     *
     */
    public function delete() : RedirectResponse
    {
        Gate::authorize('impersonate', [get_class(Auth::user()), 0]);

        Auth::loginUsingId(Session::remove('impersonation'));

        return Redirect::route(Config::get('routing.home'))
            ->notify('User impersonation has ended');
    }

    /**
     * Start impersonating a user with the given ID.
     *
     */
    public function store(int $id) : RedirectResponse
    {
        Gate::authorize('impersonate', [get_class(Auth::user()), $id]);

        Session::invalidate();

        Session::put('impersonation', Auth::id());

        Auth::loginUsingId($id);

        return Redirect::route(Config::get('routing.home'))
            ->notify('User impersonation has started');
    }
}
