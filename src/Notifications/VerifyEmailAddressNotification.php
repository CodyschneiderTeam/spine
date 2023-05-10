<?php

namespace Caneara\Spine\Notifications;

use Caneara\Spine\Support\Hash;
use Caneara\Spine\Support\DateTime;
use Illuminate\Support\Facades\URL;
use Caneara\Spine\Types\Notification;
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

        $time = DateTime::now()->addHour();

        return URL::temporarySignedRoute(
            'authentication.email.verify.confirm',
            $time,
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
