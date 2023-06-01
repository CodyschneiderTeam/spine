<?php

namespace System\Types;

use DateTimeInterface;
use System\Support\Is;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    /**
     * Attributes which cannot be mass-assigned.
     *
     */
    protected $guarded = [];

    /**
     * Attributes to hide when casting to an array or json.
     *
     */
    protected $hidden = [];

    /**
     * Retrieve a subset of the model's attributes.
     *
     */
    public function except(mixed $attributes) : array
    {
        $payload = Is::array($attributes) ? $attributes : func_get_args();

        return Arr::except($this->getAttributes(), $payload);
    }

    /**
     * Create a new factory instance for the model.
     *
     */
    public static function factory() : Factory
    {
        return Factory::factoryForModel(get_called_class());
    }

    /**
     * Determine if the given model does not belong to the model.
     *
     */
    public function doesntOwn(BaseModel $model, string $key = '') : bool
    {
        return ! $this->owns($model, $key);
    }

    /**
     * Determine if the given model belongs to the model.
     *
     */
    public function owns(BaseModel $model, string $key = '') : bool
    {
        $key = $key ?: $this->getForeignKey();

        return $this->getKey() === $model->{$key};
    }

    /**
     * Prepare a date for array or JSON serialization.
     *
     */
    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d\TH:i:s.000\Z');
    }
}
