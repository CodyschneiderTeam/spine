<?php

namespace System\Routing;

use System\Support\Arr;
use System\Support\Text;
use System\Support\Util;
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

        if (Collection::make($keyed)->count() < Collection::make($parameters)->count()) {
            $query .= '&' . Collection::make($this->getNumericParameters($parameters))
                ->map(fn($value, $key) => "{$key}={$value}")
                ->implode('&');
        }

        $query = Text::trim($query, '&');

        return $query === '' ? '' : "?{$query}";
    }
}
