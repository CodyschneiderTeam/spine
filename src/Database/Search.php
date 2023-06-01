<?php

namespace System\Database;

use Closure;
use Illuminate\Support\Arr;
use System\Support\Calendar;
use System\Macros\Builder as Macro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;

class Search
{
    /**
     * The filtering and sorting options.
     *
     */
    protected array $payload;

    /**
     * The underlying database query.
     *
     */
    protected Builder $query;

    /**
     * The ordering fallback.
     *
     */
    protected ?Closure $sort;

    /**
     * Constructor.
     *
     */
    public function __construct(Builder $query, array $payload, Closure $sort = null)
    {
        $this->sort    = $sort;
        $this->query   = $query;
        $this->payload = $payload;
    }

    /**
     * Factory method.
     *
     */
    public static function execute(Builder | Macro $query, array $payload, Closure $sort = null) : Builder
    {
        return (new static($query, $payload, $sort))
            ->withFiltering()
            ->withSorting();
    }

    /**
     * Apply the filtering constraints to the query.
     *
     */
    protected function withFiltering() : static
    {
        $zone = Auth::user()?->time_zone?->code() ?? 'UTC';

        $range = fn($value) => [
            Calendar::parse($value)->setTimezone($zone)->startOfDay()->setTimezone('UTC'),
            Calendar::parse($value)->setTimezone($zone)->endOfDay()->setTimezone('UTC'),
        ];

        foreach ($this->payload['filtering'] as $key => $filter) {
            $this->query = match ($filter['type']) {
                'calendar' => $this->query->whereBetween($key, $range($filter['value'])),
                'like'     => $this->query->whereLike($key, $filter['value']),
                'match'    => $this->query->where($key, $filter['value']),
                default    => $this->query,
            };
        }

        return $this;
    }

    /**
     * Apply the sorting constraints to the query.
     *
     */
    protected function withSorting() : Builder
    {
        return $this->query->when(Arr::exists($this->payload, 'ordering'), function($query) {
            return $query->orderBy(
                Arr::get($this->payload, 'ordering.path'),
                Arr::get($this->payload, 'ordering.direction')
            );
        })->when($this->sort && ! Arr::exists($this->payload, 'ordering'), function($query) {
            return call_user_func($this->sort, $query);
        });
    }
}
