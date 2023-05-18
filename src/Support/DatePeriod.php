<?php

namespace Caneara\Spine\Support;

use Carbon\CarbonPeriodImmutable;
use Illuminate\Support\Collection;

class DatePeriod extends CarbonPeriodImmutable
{
    /**
     * Create an array from the current period.
     *
     */
    public function toArray() : array
    {
        return Collection::make(parent::toArray())
            ->transform(fn($item) => DateTime::instance($item))
            ->toArray();
    }
}
