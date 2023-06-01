<?php

namespace System\Types;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Database\Seeder as BaseSeeder;

class Seeder extends BaseSeeder
{
    use WithFaker;
    use Conditionable;

    /**
     * Specify whether to delete legacy data.
     *
     */
    protected $wipe = true;

    /**
     * Seed the application database.
     *
     */
    public function run() : void
    {
        Model::preventLazyLoading(false);

        $this->unless(App::isProduction(), fn() => $this->seed());

        $this->when($this->wipe, fn() => File::deleteDirectory(App::storagePath('app'), true));
    }
}
