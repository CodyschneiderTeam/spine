<?php

namespace System\Testing\Types;

use Laravel\Dusk\TestCase;
use Illuminate\Support\Env;
use Illuminate\Support\Collection;
use System\Testing\Support\Browser;
use System\Testing\Configuration\Process;
use System\Testing\Configuration\Bootstrap;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Illuminate\Support\Traits\Conditionable;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClientTest extends TestCase
{
    use Process;
    use Bootstrap;
    use Conditionable;
    use DatabaseMigrations;

    /**
     * Create the remote web driver instance.
     *
     */
    protected function driver() : RemoteWebDriver
    {
        $arguments = [
            '--disable-gpu',
            '--window-size=1920,1080',
            '--time-zone-for-testing=UTC',
            Env::get('DUSK_HEADLESS', true) ? '--headless' : '',
        ];

        $arguments = Collection::make($arguments)
            ->filter()
            ->toArray();

        return RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                (new ChromeOptions())->addArguments($arguments)
            )
        );
    }

    /**
     * Create a new Browser instance.
     *
     */
    protected function newBrowser($driver) : Browser
    {
        return new Browser($driver);
    }

    /**
     * Prepare for the test execution.
     * @beforeClass
     *
     */
    public static function prepare() : void
    {
        static::startChromeDriver();
    }
}
