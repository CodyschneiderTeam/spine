<?php

namespace Caneara\Spine\Exception;

use Throwable;
use Caneara\Spine\Support\Arr;
use Caneara\Spine\Response\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Response as InertiaResponse;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Response as ResponseBuilder;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * Map of error codes to messages.
     *
     */
    protected array $exceptions = [
        TokenMismatchException::class    => ['code' => 419, 'message' => 'The page expired, please try again'],
        ThrottleRequestsException::class => ['code' => 429, 'message' => 'Too many attempts, please wait a minute'],
        AccessDeniedHttpException::class => ['code' => 403, 'message' => null],
    ];

    /**
     * Render an exception into an HTTP response.
     *
     */
    public function render($request, Throwable $e) : Response | InertiaResponse
    {
        $response = parent::render($request, $e);

        if (Arr::exists($this->exceptions, get_class($e))) {
            return $this->renderMessage($request, $e);
        }

        if (App::isProduction() && Arr::in([403, 404, 500, 503], $response->getStatusCode())) {
            return $this->renderPage($request, $response);
        }

        return $response;
    }

    /**
     * Convert the given exception into an error notification.
     *
     */
    protected function renderMessage($request, Throwable $exception) : RedirectResponse | JsonResponse
    {
        $type = $this->exceptions[get_class($exception)];

        $message = $type['message'] ?? $exception->getMessage();

        return $request->expectsJson() || $this->shouldUseJson($request)
            ? ResponseBuilder::json(['message' => $message], $type['code'])
            : Redirect::back()->notify($message, 'error');
    }

    /**
     * Convert the given base response into an Inertia response.
     *
     */
    protected function renderPage($request, Response $response) : Response
    {
        return Page::make()
            ->title('Error')
            ->view('general.error.index')
            ->with('asset', asset(''))
            ->with('notification', null)
            ->with('code', $response->getStatusCode())
            ->toResponse($request)
            ->setStatusCode($response->getStatusCode());
    }

    /**
     * Determine whether the route should always return JSON.
     *
     */
    protected function shouldUseJson($request) : bool
    {
        $routes = [
            'poll',
        ];

        return Arr::in($routes, $request->route()->getName());
    }
}
