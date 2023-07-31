<?php

namespace System\Exception;

use Throwable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     */
    public function render($request, Throwable $e) : mixed
    {
        $response = parent::render($request, $e);

        return match ($code = $response->getStatusCode()) {
            302     => $response,
            307     => Redirect::to($e->getMessage()),
            403     => $this->showErrorPage($code),
            404     => $this->showErrorPage($code),
            405     => $this->showErrorPage($code),
            418     => $this->showErrorNotification($code, $e->getMessage()),
            419     => $this->showErrorNotification($code, 'The page expired, please try again'),
            429     => $this->showErrorNotification($code, 'Too many attempts, wait a minute'),
            503     => $this->showErrorPage($code),
            default => $this->showErrorPage($code, $response),
        };
    }

    /**
     * Generate an error response notification.
     *
     */
    protected function showErrorNotification(int $code, string $message) : mixed
    {
        return Request::expectsJson()
            ? Response::json(['message' => $message], $code)
            : Redirect::back()->notify($message, 'error');
    }

    /**
     * Generate an error response page.
     *
     */
    protected function showErrorPage(int $code, mixed $response = null) : mixed
    {
        if (App::isProduction()) {
            return Response::view('app.error', ['code' => $code], $code);
        }

        return $response ?? Response::view('app.error', ['code' => $code], $code);
    }
}
