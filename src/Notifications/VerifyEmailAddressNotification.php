<?php

namespace System\Notifications;

use System\Support\Hash;
use System\Support\Calendar;
use System\Types\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Auth\Authenticatable;

class VerifyEmailAddressNotification extends Notification
{
    /**
     * Generate a temporary signed route.
     *
     */
    protected function createUrl(Authenticatable $user) : string
    {
        $payload = [
            'id'   => $user->id,
            'hash' => Hash::sha1($user->email),
        ];

        return URL::temporarySignedRoute(
            'authentication.email.verify.confirm',
            Calendar::now()->addHour(),
            $payload
        );
    }

    /**
     * Generate the Blade template to use for the notification.
     *
     */
    public function view(mixed $notifiable) : string
    {
        $url = $this->createUrl($notifiable);

        return <<<BLADE
        # Verify Email

        In order to access your account, we need you to confirm your email
        address by clicking the 'verify' button below.

        {{-- Action --}}
        @component('mail::button', ['url' => '$url'])
        Verify Email Address
        @endcomponent

        {{-- Link Help --}}
        @component('mail::subcopy')
        If you are having trouble clicking the button, you can click the following
        link, or copy and paste it into your web browser: [{$url}]({$url})
        @endcomponent
        BLADE;
    }
}
