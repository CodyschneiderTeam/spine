<?php

namespace System\Types;

use Faker\Factory;
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
     * Seed the application database.
     *
     */
    public function run() : void
    {
        $this->faker = Factory::create();

        Model::preventLazyLoading(false);

        $this->unless(App::isProduction(), fn() => File::deleteDirectory(App::storagePath('app'), true));

        $this->unless(App::isProduction(), fn() => $this->seed());
    }
}
