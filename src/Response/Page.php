<?php

namespace Caneara\Spine\Response;

use Inertia\Inertia;
use Inertia\Response;
use Caneara\Spine\Support\Str;
use Illuminate\Support\Facades\Config;

class Page
{
    /**
     * The robot configuration.
     *
     */
    protected ?string $robots;

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
            ->withViewData('robots', $this->robots ?? null)
            ->withViewData('title', $this->title ?? Config::get('app.name'));
    }

    /**
     * Assign a title to the page.
     *
     */
    public function title(string $value, bool $exact = false) : static
    {
        $product = Config::get('app.name');

        $this->title = $exact ? $value : "{$product} - {$value}";

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

    /**
     * Disable the use of robots on the page.
     *
     */
    public function withoutRobots() : static
    {
        $this->robots = 'noindex, nofollow';

        return $this;
    }
}
