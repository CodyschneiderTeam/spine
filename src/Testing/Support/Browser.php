<?php

namespace Caneara\Spine\Testing\Support;

use UnitEnum;
use GuzzleHttp\Client;
use Caneara\Spine\Support\Is;
use Caneara\Spine\Support\Str;
use Caneara\Spine\Support\Util;
use Caneara\Spine\Support\DateTime;
use Illuminate\Support\Facades\Config;
use Laravel\Dusk\Browser as BaseBrowser;
use PHPUnit\Framework\Assert as PHPUnit;

class Browser extends BaseBrowser
{
    /**
     * Constructor.
     *
     */
    public function __construct($driver, $resolver = null)
    {
        parent::__construct($driver, $resolver);

        $this->setDownloadDirectory();
    }

    /**
     * Assert that the given card has been selected.
     *
     */
    public function assertCardSelected($field, $value) : static
    {
        return parent::assertInputValue($field, $this->convertEnumToScalar($value));
    }

    /**
     * Assert that the given checkbox is checked.
     *
     */
    public function assertChecked($field, $value = null) : static
    {
        $value = Is::boolean($value) ? ($value ? '1' : '0') : $value;

        return $this->assertInputValue($field, $value);
    }

    /**
     * Assert that a file with the given file name was downloaded.
     *
     */
    public function assertDownloaded(string $file_name, int $wait = 3000) : static
    {
        $this->pause($wait);

        PHPUnit::assertCount(1, glob(getcwd() . "/storage/framework/testing/{$file_name}"));

        @unlink(glob(getcwd() . "/storage/framework/testing/{$file_name}")[0]);

        return $this;
    }

    /**
     * Assert that the given field has the given date and time.
     *
     */
    public function assertDateTime(string $field, DateTime $value) : static
    {
        return $this->assertInputValue($field, $value->format('Y-m-d\TH:i:s.000\Z'));
    }

    /**
     * Assert that the given input field has the given value.
     *
     */
    public function assertInputValue($field, $value) : static
    {
        $value = Is::boolean($value) ? ($value ? 'true' : 'false') : $value;

        return parent::assertInputValue($field, $value);
    }

    /**
     * Assert that the given statistic is present in the sidebar.
     *
     */
    public function assertSeeInSidebar(string $key, mixed $value = null) : static
    {
        return $this->assertSeeIn("@sidebar-statistic-{$key}", $value);
    }

    /**
     * Assert that the given dropdown has the given value selected.
     *
     */
    public function assertSelected($field, $value) : static
    {
        $value = Is::boolean($value) ? (int) $value : $value;

        return parent::assertSelected($field, $this->convertEnumToScalar($value));
    }

    /**
     * Assert that the given title is the same as the page's title.
     *
     */
    public function assertTitle($title) : static
    {
        $name = Config::get('app.name');

        $title = $title === $name ? $name : "{$name} - {$title}";

        $this->pause();

        return parent::assertTitle($title);
    }

    /**
     * Attach the file at the given path to the given field.
     *
     */
    public function attach($field, $path) : static
    {
        return parent::attach(Str::start($field, '@'), $path)->pause(2000);
    }

    /**
     * Select the given card.
     *
     */
    public function card($field, $value) : static
    {
        return $this->push("ui-card-{$field}-{$this->convertEnumToScalar($value)}");
    }

    /**
     * Check the given checkbox.
     *
     */
    public function check($field, $value = null) : static
    {
        $value = Is::boolean($value) ? (string) $value : $value;

        $value = Util::blank($value) ? '0' : $value;

        return $value === $this->inputValue($field) ? $this : $this->click($field);
    }

    /**
     * Click on the given Dusk selector.
     *
     */
    public function click($selector = null) : static
    {
        $selector = Str::startsWith($selector, '|')
            ? Str::substr($selector, 1)
            : Str::start($selector, '@');

        return parent::click($selector)->pause(500);
    }

    /**
     * Accept the confirmation prompt.
     *
     */
    public function confirm() : static
    {
        parent::assertSee('Are you sure you wish to proceed?');

        return $this->push('dialog_confirm_continue')->pause(1000);
    }

    /**
     * Ensure that the given value has been reduced to its scalar value.
     *
     */
    public function convertEnumToScalar(mixed $value) : mixed
    {
        return $value instanceof UnitEnum ? $value->value : $value;
    }

    /**
     * Select the given date for the given field.
     *
     */
    public function date(string $field, DateTime $value) : static
    {
        return $this->click("{$field}_text_box")
            ->pause()
            ->select("{$field}_select_year", $value->year)
            ->pause()
            ->select("{$field}_select_month", $value->month)
            ->pause()
            ->click("{$field}_select_day_{$value->day}")
            ->pause();
    }

    /**
     * Select the given date and time for the given field.
     *
     */
    public function dateTime(string $field, DateTime $value) : static
    {
        return $this->click("{$field}_text_box")
            ->pause()
            ->select("{$field}_select_year", $value->year)
            ->pause()
            ->select("{$field}_select_month", $value->month)
            ->pause()
            ->click("{$field}_select_day_{$value->day}")
            ->pause()
            ->select("{$field}_select_hour", $value->hour)
            ->pause()
            ->select("{$field}_select_minute", $value->minute)
            ->pause();
    }

    /**
     * Assign the given value to the browser's local storage.
     *
     */
    public function localStorage(string $key, string $value) : static
    {
        return $this->javascript("localStorage.setItem('{$key}', '{$value}')");
    }

    /**
     * Perform a lookup using the given parameters.
     *
     */
    public function lookup(string $field, string $search, $value, bool $assert = true) : static
    {
        $this->type("{$field}_search_display", $search)
            ->pause()
            ->click("lookup-{$field}-item-{$value}");

        return $assert ? $this->assertInputValue($field, $value) : $this;
    }

    /**
     * Execute the given JavaScript code.
     *
     */
    public function javascript(string $code) : static
    {
        return (tap($this)->script($code))->pause();
    }

    /**
     * Open the given menu and click on the given option.
     *
     */
    public function menu(string $name, string $option) : static
    {
        return $this->click("menu-{$name}")
            ->click("menu-{$name}-{$option}");
    }

    /**
     * Pause for the given amount of milliseconds.
     *
     */
    public function pause($milliseconds = 500) : static
    {
        return parent::pause($milliseconds);
    }

    /**
     * Press the given button.
     *
     */
    public function push(string $field, int $pause = 1000) : static
    {
        return $this->click($field)->pause($pause);
    }

    /**
     * Scroll to the bottom of the page.
     *
     */
    public function scrollToBottom() : static
    {
        return $this->javascript('scrollTo(0, document.body.scrollHeight)');
    }

    /**
     * Scroll to the top of the page.
     *
     */
    public function scrollToTop() : static
    {
        return $this->javascript('scrollTo(0, 0)');
    }

    /**
     * Select the given value.
     *
     */
    public function select($field, $value = null) : static
    {
        $value = Is::boolean($value) ? (int) $value : $value;

        return parent::select($field, $this->convertEnumToScalar($value));
    }

    /**
     * Configure Chrome to download files to the current directory.
     *
     */
    protected function setDownloadDirectory() : void
    {
        $payload = [
            'body' => json_encode([
                'cmd'    => 'Page.setDownloadBehavior',
                'params' => [
                    'behavior'     => 'allow',
                    'downloadPath' => getcwd() . '/storage/framework/testing/',
                ],
            ]),
        ];

        $id = $this->driver->getSessionID();

        $address = $this->driver
            ->getCommandExecutor()
            ->getAddressOfRemoteServer();

        (new Client())->post("{$address}/session/{$id}/chromium/send_command", $payload);
    }

    /**
     * Click on the given sidebar link.
     *
     */
    public function sidebar(string $key) : static
    {
        return $this->click("@sidebar-link-{$key}");
    }

    /**
     * Switch to the given menu tab.
     *
     */
    public function switchTab(string $name) : static
    {
        return $this->scrollToTop()
            ->push("ui-tab-select-{$name}")
            ->pause();
    }

    /**
     * Select the given time for the given field.
     *
     */
    public function time(string $field, string | DateTime $value) : static
    {
        $value = Is::string($value) ? new DateTime($value) : $value;

        return $this->select("{$field}_hour", $value->hour)
            ->select("{$field}_minute", $value->minute);
    }

    /**
     * Type the given value into the given field.
     *
     */
    public function type($field, $value) : static
    {
        $this->script("document.querySelector('[dusk={$field}]').value = ''");
        $this->script("document.querySelector('[dusk={$field}]').dispatchEvent(new Event('input'))");

        return parent::type($field, (string) $value);
    }

    /**
     * Browse to the given route.
     *
     */
    public function visitRoute($route, $parameters = []) : static
    {
        return parent::visitRoute($route, $parameters)
            ->pause(3000);
    }
}
