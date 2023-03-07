<?php

namespace Caneara\Spine\Kernel;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Console\Kernel;

class Console extends Kernel
{
    /**
     * Register the commands.
     *
     */
    protected function commands() : void
    {
        $this->load(App::path('Commands'));
    }
}
