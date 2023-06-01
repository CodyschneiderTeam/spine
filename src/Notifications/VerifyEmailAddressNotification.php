<?php

namespace System\Notifications;

use System\Support\Hash;
use System\Support\Calendar;
use System\Types\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;

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
     * Retrieve the mail representation of the notification.
     *
     */
    public function toMail($notifiable) : MailMessage
    {
        $url = $this->createUrl($notifiable);

        return $this->email()
            ->subject('Verify Email')
            ->markdown('mail.email.verify', ['url' => $url]);
    }
}
