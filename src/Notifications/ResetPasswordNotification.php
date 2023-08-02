<?php

namespace System\Notifications;

use System\Types\Notification;
use Illuminate\Support\Facades\URL;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     */
    public string $token;

    /**
     * Constructor.
     *
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Generate the Blade template to use for the notification.
     *
     */
    public function view(mixed $notifiable) : string
    {
        $url = URL::route('authentication.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email,
        ]);

        return <<<BLADE
        # Reset Password

        We received a request to reset your account password. To complete
        the process, please click the button below.

        If you didn't submit a request to change your password, then please
        ignore this email.

        {{-- Action --}}
        @component('mail::button', ['url' => '$url'])
        Reset Password
        @endcomponent

        {{-- Link Help --}}
        @component('mail::subcopy')
        If you are having trouble clicking the button, you can click the following
        link, or copy and paste it into your web browser: [{$url}]({$url})
        @endcomponent
        BLADE;
    }
}
