<?php

namespace System\Database;

use System\Types\Model;
use System\Support\Text;
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
        Model::handleLazyLoadingViolationUsing(function($model, $relation) {
            $source = get_class($model->$relation()->getRelated());

            if (! App::runningUnitTests() && Text::startsWith($source, 'App')) {
                throw new LazyLoadingViolationException($model, $relation);
            }
        });
    }
}
