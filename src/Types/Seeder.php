<?php

namespace Caneara\Spine\Types;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Database\Seeder as BaseSeeder;

class Seeder extends BaseSeeder
{
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

        $this->when($this->wipe, fn() => $this->wipe());

        $this->unless(App::isProduction(), fn() => $this->seed());
    }

    /**
     * Purge any legacy data before executing the operations.
     *
     */
    protected function wipe() : void
    {
        File::deleteDirectory(App::storagePath('app'), true);
    }
}
