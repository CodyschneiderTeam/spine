<?php

namespace Caneara\Spine\Rules;

use TypeError;
use Caneara\Spine\Types\Rule;
use Illuminate\Support\Collection;

class EnumRule extends Rule
{
    /**
     * Convert the given value into an instance of the given enum.
     *
     */
    protected function convert(string $enum, mixed $value) : mixed
    {
        try {
            return $enum::tryFrom($value) ? $enum::tryFrom($value) : null;
        } catch (TypeError) {
            return null;
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     */
    public function passes($value) : bool
    {
        $value = $this->convert($enum = $this->parameters[0], $value);

        return Collection::make($enum::toArray($this->parameters[1] ?? null))
            ->map(fn($item) => $item['id'])
            ->contains($value);
    }
}
