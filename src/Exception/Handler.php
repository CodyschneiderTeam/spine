<?php

namespace System\Exception;

use Throwable;
use System\Support\Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Response as ResponseBuilder;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     */
    protected $dontReport = [
        TemporaryRedirectException::class,
    ];

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
     * Map of HTTP status codes.
     *
     */
    protected array $errors = [
        302 => ['code' => 302, 'title' => 'Unexpected Redirect',   'description' => "The server encounted an unexpected redirect to another page."],
        401 => ['code' => 401, 'title' => 'Unauthorized',          'description' => "You are not authorized to perform this action."],
        402 => ['code' => 402, 'title' => 'Billing Issue',         'description' => "You are not able to proceed due to an outstanding payment, or lack of a subscription."],
        403 => ['code' => 403, 'title' => 'Forbidden',             'description' => "An error was encountered while attempting to access this page."],
        404 => ['code' => 404, 'title' => 'Page Not Found',        'description' => "The page you were trying to access could not be found."],
        405 => ['code' => 405, 'title' => 'Not Allowed',           'description' => "The chosen request method is not supported for the requested resource."],
        408 => ['code' => 408, 'title' => 'Request Timeout',       'description' => "The server timed out while waiting for a response from an external site. Please try again, or contact us."],
        419 => ['code' => 419, 'title' => 'Page Expired',          'description' => "The security token for the page has expired. Please refresh the page and try again."],
        422 => ['code' => 422, 'title' => 'Unprocessable Request', 'description' => "The server was unable to process your request. Please try again."],
        429 => ['code' => 429, 'title' => 'Too Many Requests',     'description' => "Too many requests have been sent. Please wait a few minutes."],
        500 => ['code' => 500, 'title' => 'Server Issue',          'description' => "The server encountered an unknown error and was unfortunately unable to recover from it. Please try again, or contact us."],
        503 => ['code' => 503, 'title' => 'Maintenance Mode',      'description' => "The server is currently unavailable while we conduct routine maintenance… please check back later."],
    ];

    /**
     * Render an exception into an HTTP response.
     *
     */
    public function render($request, Throwable $e) : Response
    {
        $response = parent::render($request, $e);

        if (Arr::exists($this->exceptions, get_class($e))) {
            return $this->renderMessage($request, $e);
        }

        if (App::isProduction() && Arr::contains($response->getStatusCode(), [403, 404, 500, 503])) {
            return ResponseBuilder::view('app.error', $this->errors[$response->getStatusCode()]);
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

        return $request->expectsJson()
            ? ResponseBuilder::json(['message' => $message], $type['code'])
            : Redirect::back()->notify($message, 'error');
    }
}
