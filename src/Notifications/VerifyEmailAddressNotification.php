<?php

namespace System\Notifications;

use System\Support\Hash;
use System\Support\Calendar;
use System\Types\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

class VerifyEmailAddressNotification extends Notification
{
    /**
     * The URL used to verify the email address.
     *
     */
    public string $url;

    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        $payload = [
            'id'   => $this->notifiable->id,
            'hash' => Hash::sha1($this->notifiable->email),
        ];

        $this->url = URL::temporarySignedRoute(
            'authentication.email.verify.confirm',
            Calendar::now()->addMinutes(Config::get('auth.verification.expire')),
            $payload
        );
    }

    /**
     * Generate the Blade template to use for the notification.
     *
     */
    public function view() : string
    {
        return <<<BLADE
        # Verify Email

        In order to access your account, we need you to confirm your email
        address by clicking the 'verify' button below.

        {{-- Action --}}
        @component('mail::button', ['url' => '$this->url'])
        Verify Email Address
        @endcomponent

        {{-- Link Help --}}
        @component('mail::subcopy')
        If you are having trouble clicking the button, you can click the following
        link, or copy and paste it into your web browser: [{$this->url}]({$this->url})
        @endcomponent
        BLADE;
    }
}
