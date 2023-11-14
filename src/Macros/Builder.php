<?php

namespace System\Macros;

use System\Database\Search;
use Illuminate\Database\Query\Builder as Facade;

class Builder
{
    /**
     * Register the macros.
     *
     */
    public static function register() : void
    {
        static::search();
        static::whereLike();
        static::orWhereLike();
    }

    /**
     * Register the 'search' macro.
     *
     */
    protected static function search() : void
    {
        Facade::macro('search', function($payload, $sort = null) {
            return Search::execute($this, $payload, $sort);
        });
    }

    /**
     * Register the 'or where like' macro.
     *
     */
    protected static function orWhereLike() : void
    {
        Facade::macro('orWhereLike', function($key, $value = '') {
            return $this->when($value, function($query) use ($key, $value) {
                return $query->orWhere($key, 'LIKE', "%{$value}%");
            });
        });
    }

    /**
     * Register the 'where like' macro.
     *
     */
    protected static function whereLike() : void
    {
        Facade::macro('whereLike', function($key, $value = '') {
            return $this->when($value, function($query) use ($key, $value) {
                return $query->where($key, 'LIKE', "%{$value}%");
            });
        });
    }
}
