<?php

namespace System\Types;

use System\Support\Is;
use System\Support\Util;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Factories\Factory as BaseFactory;

abstract class Factory extends BaseFactory
{
    /**
     * Associate the given models with the factory.
     *
     */
    public function belongsTo(...$models) : static
    {
        $factory = $this;

        foreach ($models as $model) {
            $factory = Is::array($model)
                ? $factory->for($model[0], $model[1] ?? null)
                : $factory->for($model);
        }

        return $factory;
    }

    /**
     * Create a collection of models and persist them to the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\App\Types\Model|\Illuminate\Contracts\Auth\Authenticatable
     */
    public function create($attributes = [], ?BaseModel $parent = null) : mixed
    {
        return parent::create($attributes, $parent);
    }

    /**
     * Create related models and associate them with the factory.
     *
     */
    public function with(int | string $count, mixed $model = null, mixed $relations = null, mixed $attributes = null) : static
    {
        if (Is::string($count)) {
            $attributes = $relations;
            $relations  = $model;
            $model      = $count;
            $count      = 1;
        }

        $factory = $model::factory($count);

        if (Util::filled($relations)) {
            $factory = $factory->belongsTo(
                ...(Is::array($relations) ? $relations : [$relations])
            );
        }

        return $this->has(Util::blank($attributes) ? $factory : $factory->state($attributes));
    }
}
