<?php

namespace Caneara\Spine\Macros;

use Illuminate\Support\Testing\Fakes\NotificationFake as Facade;

class Notification
{
    /**
     * Register the macros.
     *
     */
    public static function register() : void
    {
        static::assertSent();
    }

    /**
     * Register the 'assert sent' macro.
     *
     */
    protected static function assertSent() : void
    {
        Facade::macro('assertSent', function($user, $class) {
            $notification = null;

            $this->assertSentTo($user, $class, function($message) use (&$notification, $user) {
                $notification = $message->setRecipient($user);

                return true;
            });

            return $notification;
        });
    }
}
