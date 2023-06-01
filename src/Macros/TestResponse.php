<?php

namespace System\Macros;

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
        static::assertNotification();
    }

    /**
     * Register the 'assert notification' macro.
     *
     */
    protected static function assertNotification() : void
    {
        Facade::macro('assertNotification', function($message, $type = 'success', $fixed = false) {
            return Util::tap($this)->assertSessionHas('notification', [
                'message' => $message,
                'type'    => $type,
                'fixed'   => $fixed,
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
}
