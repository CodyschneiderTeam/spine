<?php

namespace Caneara\Spine\Response;

use Inertia\Inertia;
use Inertia\Response;
use Caneara\Spine\Support\Str;
use Illuminate\Support\Facades\Config;

class Page
{
    /**
     * The title.
     *
     */
    protected ?string $title;

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
    protected function render() : Response
    {
        Inertia::setRootView('app.index');

        return Inertia::render($this->view)
            ->with('title', $this->title ?? Config::get('app.name'))
            ->withViewData('title', $this->title ?? Config::get('app.name'));
    }

    /**
     * Assign a title to the page.
     *
     */
    public function title(string $value) : static
    {
        $product = Config::get('app.name');

        $this->title = "{$product} - {$value}";

        return $this;
    }

    /**
     * Assign a view to the page.
     *
     */
    public function view(string $value) : Response
    {
        $this->view = Str::replace('.', '/', $value);

        return $this->render();
    }

    /**
     * Assign the given key and value to the page.
     *
     */
    public function with(string $key, mixed $value) : Response
    {
        return $this->render()->with($key, $value);
    }
}
