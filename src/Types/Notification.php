<?php

namespace System\Types;

use Exception;
use System\Support\Arr;
use System\Support\Text;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Markdown;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Blade;
use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification as BaseNotification;

class Notification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    /**
     * The rendered mailable.
     *
     */
    protected MailMessage $mailable;

    /**
     * Verify that the email's action button uses the given label and url.
     *
     */
    public function assertAction(string $label, string $url, bool $query = true) : static
    {
        $action = $query ? $this->getActionUrl() : Text::before($this->getActionUrl(), '?');

        PHPUnit::assertEquals($action, $url);

        return $this->assertMessageContains($label);
    }

    /**
     * Verify that the email's from field matches the given address.
     *
     */
    public function assertFrom(string $address) : static
    {
        foreach ($this->mailable->from as $value) {
            if ($value === $address) {
                return $this;
            }
        }

        throw new Exception('The from address was not found in the email');
    }

    /**
     * Verify that the email's markdown path matches the given path.
     *
     */
    public function assertMarkdown(string $path) : static
    {
        PHPUnit::assertEquals($this->mailable->markdown, $path);

        return $this;
    }

    /**
     * Verify that the email's body contains the given text.
     *
     */
    public function assertMessageContains(string $text) : static
    {
        $body = Container::getInstance()->make(Markdown::class)
            ->render($this->mailable->markdown, $this->mailable->viewData);

        PHPUnit::assertTrue(Text::contains($body->toHtml(), $text));

        return $this;
    }

    /**
     * Verify that the email's body does not contain the given text.
     *
     */
    public function assertMessageDoesntContain(string $text) : static
    {
        $body = Container::getInstance()->make(Markdown::class)
            ->render($this->mailable->markdown, $this->mailable->viewData);

        PHPUnit::assertFalse(Text::contains($body->toHtml(), $text));

        return $this;
    }

    /**
     * Verify that the email's reply to field matches the given address.
     *
     */
    public function assertReplyTo(string $address) : static
    {
        foreach ($this->mailable->replyTo[0] as $value) {
            if ($value === $address) {
                return $this;
            }
        }

        throw new Exception('The reply to address was not found in the email');
    }

    /**
     * Verify that the email's subject matches the given subject.
     *
     */
    public function assertSubject(string $subject) : static
    {
        PHPUnit::assertEquals($this->mailable->subject, $subject);

        return $this;
    }

    /**
     * Verify that the email contains view data with the given key and value.
     *
     */
    public function assertViewData(string $key, $value) : static
    {
        PHPUnit::assertEquals($this->mailable->viewData[$key], $value);

        return $this;
    }

    /**
     * Create a new email message.
     *
     */
    protected function email(mixed $notifiable, string $subject = '') : MailMessage
    {
        $message = new MailMessage();

        if (! method_exists($this, 'view')) {
            throw new Exception('No inline view is available for this email notification');
        }

        $payload = method_exists($this, 'parameters') ? $this->parameters() : [];

        return $message->subject($subject)->markdown(
            'vendor.mail.html.index',
            Arr::merge($payload, ['slot' => Blade::render($this->view($notifiable))])
        );
    }

    /**
     * Retrieve the email's action button url.
     *
     */
    public function getActionUrl(string $key = 'url') : string
    {
        return $this->mailable->viewData[$key];
    }

    /**
     * Assign the notifiable model to use for testing.
     *
     */
    public function setRecipient(mixed $notifiable) : static
    {
        $this->mailable = $this->toMail($notifiable);

        return $this;
    }

    /**
     * Retrieve the mail representation of the notification.
     *
     */
    public function toMail($notifiable) : MailMessage
    {
        $subject = Text::of(get_class($this))
            ->classBasename()
            ->before('Notification')
            ->kebab()
            ->replace('-', ' ')
            ->title()
            ->toString();

        return $this->email($notifiable, $subject);
    }

    /**
     * Get the notification's default delivery channels.
     *
     */
    public function via($notifiable) : array
    {
        return ['mail'];
    }
}
