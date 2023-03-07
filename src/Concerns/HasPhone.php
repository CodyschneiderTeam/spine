<?php

namespace Caneara\Spine\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasPhone
{
    /**
     * Retrieve the formatted phone number.
     *
     */
    public function phoneFormatted() : Attribute
    {
        return new Attribute(
            get: fn() => $this->phone?->formatInternational() ?? '',
        );
    }
}
