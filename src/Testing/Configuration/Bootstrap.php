<?php

namespace System\Testing\Configuration;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Console\Kernel;

trait Bootstrap
{
    /**
     * Create the application.
     *
     */
    public function createApplication() : Application
    {
        $app = require $_SERVER['PWD'] . '/bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
