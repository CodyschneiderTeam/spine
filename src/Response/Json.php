<?php

namespace Caneara\Spine\Response;

use Caneara\Spine\Support\Arr;
use Caneara\Spine\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

class Json
{
    /**
     * The content to send.
     *
     */
    protected array $data = [];

    /**
     * The URL path.
     *
     */
    protected string $url = '';

    /**
     * The Vue file.
     *
     */
    protected string $view = '';

    /**
     * Factory method.
     *
     */
    public static function make() : static
    {
        return new static();
    }

    /**
     * Generate an Inertia response.
     *
     */
    public function render() : JsonResponse
    {
        $payload = [
            'props'     => Arr::merge(['errors' => []], $this->data),
            'component' => $this->view,
            'url'       => $this->url,
        ];

        return Response::json($payload, 200, ['X-Inertia' => 'true']);
    }

    /**
     * Assign a route to the response.
     *
     */
    public function route(string $value) : static
    {
        $url = parse_url(URL::route($value));

        $this->url = $url['path'] . (($url['query'] ?? false) ? "?{$url['query']}" : '');

        return $this;
    }

    /**
     * Assign a view to the response.
     *
     */
    public function view(string $value) : static
    {
        $this->view = Str::replace('.', '/', $value);

        return $this;
    }

    /**
     * Assign the given key and value to the response.
     *
     */
    public function with(string $key, mixed $value) : static
    {
        $this->data[$key] = $value;

        return $this;
    }
}
