<?php

namespace Caneara\Spine\Testing\Types;

use Laravel\Dusk\TestCase;
use Illuminate\Support\Env;
use Caneara\Spine\Support\Arr;
use Caneara\Spine\Testing\Support\Browser;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Illuminate\Support\Traits\Conditionable;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Caneara\Spine\Testing\Configuration\Process;
use Caneara\Spine\Testing\Configuration\Bootstrap;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AcceptanceTest extends TestCase
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
        $arguments = Arr::filter([
            '--disable-gpu',
            '--window-size=1920,1080',
            Env::get('DUSK_HEADLESS', true) ? '--headless' : '',
        ]);

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
