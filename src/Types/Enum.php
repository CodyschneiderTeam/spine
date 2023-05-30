<?php

namespace Caneara\Spine\Types;

use ReflectionEnum;
use BadMethodCallException;
use Caneara\Spine\Support\Arr;
use Caneara\Spine\Support\Str;
use Caneara\Spine\Support\Util;
use Illuminate\Support\Collection;

trait Enum
{
    /**
     * Defer to checking the case of the current instance.
     *
     */
    public function __call(string $name, array $arguments) : bool
    {
        $check = Str::startsWith($name, 'isNot') ? 'falsy' : 'truthy';

        $key = Str::of($name)
            ->substr($check === 'truthy' ? 2 : 5)
            ->upper()
            ->toString();

        $reflect = new ReflectionEnum($this);

        if (! $reflect->hasConstant($key)) {
            throw new BadMethodCallException("Constant not found for - {$name}");
        }

        return $check === 'truthy'
            ? $this === $reflect->getConstant($key)
            : $this !== $reflect->getConstant($key);
    }

    /**
     * Retrieve an item from the array of cases that matches the given key and value.
     *
     */
    public static function find(mixed $value = null, string $key = 'id') : array | null
    {
        if (Util::blank($value)) {
            return null;
        }

        $result = Collection::make(static::toArray())
            ->when($value, fn($items) => $items->where($key, $value));

        return $result->count() === 1 ? $result->first() : $result->toArray();
    }

    /**
     * Retrieve the value associated with the given label.
     *
     */
    public static function fromLabel(string $name) : static
    {
        return Collection::make(static::toArray())
            ->filter(fn($item) => Str::lower($item['label']) === Str::lower($name))
            ->first()['id'];
    }

    /**
     * Determine if the current instance is in the given set of cases.
     *
     */
    public function in(self ...$cases) : bool
    {
        return Arr::in($cases, $this);
    }

    /**
     * Generate a clean version of the instance's label.
     *
     */
    public function label() : string
    {
        return Str::of($this->name)
            ->title()
            ->replace('_In_', '_in_')
            ->replace('_Or_', '_or_')
            ->replace('_Of_', '_of_')
            ->replace('_And_', '_and_')
            ->replace('_', ' ')
            ->toString();
    }

    /**
     * Retrieve a random case from the selection.
     *
     */
    public static function random(string $key = null) : mixed
    {
        $case = Arr::random(static::toArray());

        return $key ? $case[$key] : $case;
    }

    /**
     * Retrieve the available cases as an array.
     *
     */
    public static function toArray() : array
    {
        return Collection::make(static::cases())
            ->map(fn($item) => ['id' => $item, 'label' => $item->label()])
            ->sortBy('label')
            ->values()
            ->toArray();
    }
}
