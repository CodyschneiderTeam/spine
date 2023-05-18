<?php

namespace Caneara\Spine\Routing;

use Caneara\Spine\Support\Arr;
use Caneara\Spine\Support\Str;
use Caneara\Spine\Support\Util;
use Illuminate\Support\Collection;
use Illuminate\Routing\RouteUrlGenerator as BaseRouteUrlGenerator;

class RouteUrlGenerator extends BaseRouteUrlGenerator
{
    /**
     * Retrieve the query string for a given route.
     *
     */
    protected function getRouteQueryString(array $parameters) : string
    {
        if (Util::blank($parameters)) {
            return '';
        }

        $query = Arr::query($keyed = $this->getStringParameters($parameters));

        if (Arr::size($keyed) < Arr::size($parameters)) {
            $query .= '&' . Collection::make($this->getNumericParameters($parameters))
                ->map(fn($value, $key) => "{$key}={$value}")
                ->implode('&');
        }

        $query = Str::trim($query, '&');

        return $query === '' ? '' : "?{$query}";
    }
}
