<?php

namespace Caneara\Spine\Exception;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TemporaryRedirectException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     */
    public function render() : RedirectResponse
    {
        return Redirect::to($this->getMessage());
    }
}
