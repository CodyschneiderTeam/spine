<?php

namespace System\Types;

use System\Support\Is;
use System\Support\Arr;
use System\Support\Util;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;

abstract class ListRequest extends FormRequest
{
    /**
     * Retrieve the list of columns to display.
     *
     */
    public mixed $columns = [];

    /**
     * Retrieve the applicable filtering options.
     *
     */
    public mixed $filtering = [];

    /**
     * Retrieve the applicable ordering options.
     *
     */
    public mixed $ordering = [];

    /**
     * Retrieve the column options.
     *
     */
    public function columns() : array
    {
        return $this->toCollection('columns')
            ->map(fn($item) => $this->sanitize($item))
            ->toArray();
    }

    /**
     * Retrieve the filtering options.
     *
     */
    public function filtering() : array
    {
        return $this->toCollection('filtering')
            ->map(fn($item) => $this->sanitize($item))
            ->toArray();
    }

    /**
     * Retrieve the ordering options.
     *
     */
    public function ordering() : array
    {
        return $this->toCollection('ordering')
            ->map(fn($item) => $this->sanitize($item))
            ->toArray();
    }

    /**
     * Retrieve the default ordering key.
     *
     */
    public function orderKey() : string
    {
        return property_exists($this, 'order_key') ? $this->order_key : 'order_by';
    }

    /**
     * Retrieve the validation rules that apply to the request.
     *
     */
    public function rules() : array
    {
        $ordering = $this->toCollection('ordering')
            ->pluck('id')
            ->toArray();

        return $this->toCollection('filtering')
            ->map(fn($filter) => [$filter['id'] => 'sometimes|bail|nullable|string'])
            ->push([$this->orderKey() => ['sometimes', 'bail', 'nullable', 'string', Rule::in($ordering)]])
            ->collapse()
            ->toArray();
    }

    /**
     * Remove content that should not be passed to the front-end.
     *
     */
    protected function sanitize(array $item) : array
    {
        Arr::forget($item, ['path', 'type', 'direction']);

        return $item;
    }

    /**
     * Retrieve the given attribute as a collection (adding identifiers if needed).
     *
     */
    protected function toCollection(string $name) : Collection
    {
        $process = function($items) {
            return Collection::make($items)->map(function($item, $index) {
                $item['id'] = $index;

                return $item;
            });
        };

        if (Is::array($this->{$name})) {
            $this->{$name} = $process($this->{$name});
        }

        return $this->{$name};
    }

    /**
     * Prepare the validated data for use.
     *
     */
    public function validated($key = null, $default = null) : mixed
    {
        $format = function($item, $key) {
            return [$this->toCollection('filtering')->firstWhere('id', $key)['path'] => [
                'type'  => $this->toCollection('filtering')->firstWhere('id', $key)['type'],
                'value' => $item,
            ]];
        };

        $filtering = Collection::make(parent::validated())
            ->reject(fn($item, $key) => Util::blank($item) || $key === $this->orderKey())
            ->reject(fn($item, $key) => Is::string($key) && $this->toCollection('filtering')->doesntContain('path', $key))
            ->mapWithKeys(fn($item, $key) => $format($item, $key))
            ->toArray();

        $ordering = $this->toCollection('ordering')
            ->where('id', $this->validationData()[$this->orderKey()] ?? -1)
            ->whenEmpty(fn() => $this->toCollection('ordering')->where('default', true))
            ->first();

        $result = [
            'filtering' => $filtering,
            'ordering'  => $ordering,
        ];

        return $key ? $result[$key] ?? $default : $result;
    }
}
