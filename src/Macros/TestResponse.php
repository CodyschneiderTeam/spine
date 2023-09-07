<?php

namespace System\Macros;

use System\Support\Arr;
use System\Support\Text;
use System\Support\Util;
use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Testing\TestResponse as Facade;

class TestResponse
{
    /**
     * Register the macros.
     *
     */
    public static function register() : void
    {
        static::assertPage();
        static::assertProperty();
        static::assertNotification();
        static::assertPropertyContains();
    }

    /**
     * Register the 'assert notification' macro.
     *
     */
    protected static function assertNotification() : void
    {
        Facade::macro('assertNotification', function($message, $type = 'success') {
            return Util::tap($this)->assertSessionHas('message', [
                'content' => $message,
                'type'    => $type,
            ]);
        });
    }

    /**
     * Register the 'assert page' macro.
     *
     */
    protected static function assertPage() : void
    {
        Facade::macro('assertPage', function($path) {
            $page = Text::replace('/', '.', $this->original->getData()['page']['component']);

            PHPUnit::assertEquals($path, $page);

            return $this;
        });
    }

    /**
     * Register the 'assert property' macro.
     *
     */
    protected static function assertProperty() : void
    {
        Facade::macro('assertProperty', function($key, $value) {
            $prop = Arr::get($this->original->getData(), "page.props.{$key}");

            PHPUnit::assertEquals($prop, $value);

            return $this;
        });
    }

    /**
     * Register the 'assert property contains' macro.
     *
     */
    protected static function assertPropertyContains() : void
    {
        Facade::macro('assertPropertyContains', function($key, $value) {
            $prop = Arr::get($this->original->getData(), "page.props.{$key}");

            PHPUnit::assertStringContainsStringIgnoringLineEndings($value, $prop);

            return $this;
        });
    }
}
