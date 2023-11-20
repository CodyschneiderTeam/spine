<?php

namespace System\Types;

use ReflectionEnum;
use System\Support\Arr;
use System\Support\Text;
use System\Support\Util;
use BadMethodCallException;
use Illuminate\Support\Collection;

trait Enum
{
    /**
     * Defer to checking the case of the current instance.
     *
     */
    public function __call(string $name, array $arguments) : bool
    {
        $check = Text::startsWith($name, 'isNot') ? 'falsy' : 'truthy';

        $key = Text::of($name)
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
    public static function find(mixed $value = null, string $key = 'id', bool $cast = false) : array | null
    {
        if (Util::blank($value)) {
            return null;
        }

        $value = $cast ? static::from($value) : $value;

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
            ->filter(fn($item) => Text::lower($item['label']) === Text::lower($name))
            ->first()['id'];
    }

    /**
     * Determine if the current instance is in the given set of cases.
     *
     */
    public function in(self ...$cases) : bool
    {
        return Collection::make($cases)->contains($this);
    }

    /**
     * Generate a clean version of the instance's label.
     *
     */
    public function label() : string
    {
        return Text::of($this->name)
            ->lower()
            ->ucfirst()
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
