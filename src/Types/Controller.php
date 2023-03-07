<?php

namespace Caneara\Spine\Types;

use BadMethodCallException;
use Caneara\Spine\Support\Arr;
use Inertia\Response as InertiaResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\ControllerMiddlewareOptions;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller
{
    use ValidatesRequests;
    use AuthorizesRequests;

    /**
     * The middleware registered on the controller.
     *
     */
    protected array $middleware = [];

    /**
     * Execute an action on the controller.
     *
     */
    public function callAction(string $method, array $parameters) : Response | InertiaResponse
    {
        return $this->{$method}(...Arr::values($parameters));
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     */
    public function __call(string $method, array $parameters) : mixed
    {
        throw new BadMethodCallException(
            'Method ' . static::class . "::{$method} does not exist."
        );
    }

    /**
     * Retrieve the middleware assigned to the controller.
     *
     */
    public function getMiddleware() : array
    {
        return $this->middleware;
    }

    /**
     * Register middleware on the controller.
     *
     */
    public function middleware(string ...$middleware) : ControllerMiddlewareOptions
    {
        $options = [];

        foreach ($middleware as $m) {
            $this->middleware[] = ['middleware' => $m, 'options' => &$options];
        }

        return new ControllerMiddlewareOptions($options);
    }
}
