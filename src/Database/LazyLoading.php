<?php

namespace Caneara\Spine\Database;

use Caneara\Spine\Support\Str;
use Caneara\Spine\Types\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\LazyLoadingViolationException;

class LazyLoading
{
    /**
     * Define how database lazy-loading should be handled.
     *
     */
    public static function setup() : void
    {
        Model::preventLazyLoading(! App::isProduction());

        Model::handleLazyLoadingViolationUsing(function($model, $relation) {
            $source = get_class($model->$relation()->getRelated());

            if (! App::runningUnitTests() && Str::startsWith($source, 'App')) {
                throw new LazyLoadingViolationException($model, $relation);
            }
        });
    }
}
