<?php

namespace System\Database;

use Closure;
use Exception;
use System\Support\Arr;
use System\Support\Text;
use System\Support\Util;
use System\Support\Calendar;
use System\Types\ListRequest;
use Illuminate\Support\Collection;
use System\Macros\Builder as Macro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Expression;

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
    public function __construct(Builder $query, ListRequest $request, Closure $sort = null)
    {
        foreach ($request->filtering as $filter) {
            if (Util::blank($query->columns) && ($filter['type'] ?? '') === 'having') {
                throw new Exception("You need to select the columns using ->select() when filters include 'having'");
            }
        }

        $this->sort    = $sort;
        $this->query   = $query;
        $this->payload = $request->validated();
    }

    /**
     * Factory method.
     *
     */
    public static function execute(Builder | Macro $query, ListRequest $request, Closure $sort = null) : Builder
    {
        return (new static($query, $request, $sort))
            ->withFiltering()
            ->withSorting();
    }

    /**
     * Extract the relevant having clause from the underlying query and format it for use.
     *
     */
    protected function havingExpression(string $key, mixed $value) : Builder
    {
        $sql = Collection::make($this->query->columns)
            ->filter(fn($item) => $item instanceof Expression)
            ->map(fn($item) => Text::lower($item->getValue($this->query->getGrammar())))
            ->filter(fn($item) => Text::endsWith($item, $key))
            ->map(fn($item) => Text::before($item, 'as '))
            ->first();

        return $this->query->havingRaw("$sql = {$value}");
    }

    /**
     * Apply the filtering constraints to the query.
     *
     */
    protected function withFiltering() : static
    {
        $zone = Auth::user()?->time_zone?->code() ?? 'UTC';

        $period = fn($value) => [
            Calendar::parse($value)->setTimezone($zone)->startOfDay()->setTimezone('UTC'),
            Calendar::parse($value)->setTimezone($zone)->endOfDay()->setTimezone('UTC'),
        ];

        foreach ($this->payload['filtering'] as $key => $filter) {
            $this->query = match ($filter['type']) {
                'calendar' => $this->query->whereBetween($key, $period($filter['value'])),
                'having'   => $this->havingExpression($key, $filter['value']),
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
        return $this->query->when($this->payload['ordering'], function($query) {
            return $query->orderBy(
                Arr::get($this->payload, 'ordering.path'),
                Arr::get($this->payload, 'ordering.direction')
            );
        })->when($this->sort && ! $this->payload['ordering'], function($query) {
            return call_user_func($this->sort, $query);
        });
    }
}
