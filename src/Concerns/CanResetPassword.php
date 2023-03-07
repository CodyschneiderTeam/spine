<?php

namespace Caneara\Spine\Concerns;

use Caneara\Spine\Notifications\ResetPasswordNotification;

trait CanResetPassword
{
    /**
     * Retrieve the email address where password reset links are sent.
     *
     */
    public function getEmailForPasswordReset() : string
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     */
    public function sendPasswordResetNotification($token) : void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
