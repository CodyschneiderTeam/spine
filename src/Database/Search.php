<?php

namespace Caneara\Spine\Database;

use Caneara\Spine\Support\Arr;
use Illuminate\Database\Query\Builder;
use Caneara\Spine\Macros\Builder as Macro;

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
     * Constructor.
     *
     */
    public function __construct(Builder $query, array $payload)
    {
        $this->query   = $query;
        $this->payload = $payload;
    }

    /**
     * Factory method.
     *
     */
    public static function execute(Builder | Macro $query, array $payload) : Builder
    {
        return (new static($query, $payload))
            ->withFiltering()
            ->withSorting();
    }

    /**
     * Apply a date filter.
     *
     */
    protected function filterByDate(string $key, string $value) : Builder
    {
        $parameters = [
            "{$value} 00:00:00",
            "{$value} 23:59:59",
        ];

        return $this->query->whereBetween($key, $parameters);
    }

    /**
     * Apply a date range / period filter.
     *
     */
    protected function filterByPeriod(string $key, string $value) : Builder
    {
        $range = Arr::split('|', $value);

        $parameters = [
            "{$range[0]} 00:00:00",
            ($range[1] ? $range[1] : $range[0]) . ' 23:59:59',
        ];

        return $this->query->whereBetween($key, $parameters);
    }

    /**
     * Apply the filtering constraints to the query.
     *
     */
    protected function withFiltering() : static
    {
        foreach ($this->payload['filtering'] as $key => $filter) {
            $this->query = match ($filter['type']) {
                'date'   => $this->filterByDate($key, $filter['value']),
                'like'   => $this->query->whereLike($key, $filter['value']),
                'match'  => $this->query->where($key, $filter['value']),
                'period' => $this->filterByPeriod($key, $filter['value']),
                default  => $this->query,
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
        return $this->query->when($this->payload['ordering'], function($query) {
            return $query->orderBy(
                $this->payload['ordering']['path'],
                $this->payload['ordering']['direction']
            );
        });
    }
}
