<?php

namespace System\Testing\Configuration;

use Illuminate\Support\Env;
use System\Support\Calendar;
use Illuminate\Support\Facades\App;
use System\Testing\Support\Browser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

trait Process
{
    /**
     * Perform the pre-testing operations.
     *
     */
    protected function setUp() : void
    {
        parent::setUp();

        Cache::flush();

        Calendar::freeze();

        Http::preventStrayRequests();

        $this->unless(Env::get('APP_DUSK'), fn() => $this->withoutVite());

        File::deleteDirectory(App::storagePath('framework/testing'), true);
        File::deleteDirectory(App::storagePath('framework/dusk/console'), true);
        File::deleteDirectory(App::storagePath('framework/dusk/screenshots'), true);

        Browser::$storeConsoleLogAt  = App::storagePath('framework/dusk/console');
        Browser::$storeScreenshotsAt = App::storagePath('framework/dusk/screenshots');
    }

    /**
     * Perform the post-testing operations.
     *
     */
    protected function tearDown() : void
    {
        File::deleteDirectory(App::storagePath('framework/testing'), true);
        File::deleteDirectory(App::storagePath('framework/dusk/console'), true);

        parent::tearDown();
    }
}
