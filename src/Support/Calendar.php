<?php

namespace System\Support;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriodImmutable;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Date as Facade;

class Calendar extends CarbonImmutable
{
    use WithFaker;

    /**
     * Format the instance as a human-friendly date.
     *
     */
    public function date() : string
    {
        return $this->format('M j, Y');
    }

    /**
     * Format the instance as a human-friendly date and time.
     *
     */
    public function dateTime() : string
    {
        return $this->format('M j, Y - g:i');
    }

    /**
     * Lock the current date and time.
     *
     */
    public static function freeze() : void
    {
        parent::setTestNow(parent::now()->startOfSecond());
        Carbon::setTestNow(Carbon::now()->startOfSecond());
    }

    /**
     * Generate a random date and time in the future observing the given limits.
     *
     */
    public static function inTheFuture(string $range = '1 day', self $instance = null) : static
    {
        $instance ??= static::now();

        $matches = Text::contains($range, '-')
            ? Regex::match('/^(\d+)\s?-\s?(\d+)\s(.+)(?<!s)/', $range)
            : Regex::match('/^((\d+))\s(.+)(?<!s)/', $range);

        $to = $instance->add("{$matches[2]} {$matches[3]}");

        $from = Text::contains($range, '-') ? $instance->add("{$matches[1]} {$matches[3]}") : $instance;

        $seconds = $instance->faker()->numberBetween($from->getTimestamp(), $to->getTimestamp());

        return $instance->setTimestamp($seconds);
    }

    /**
     * Generate a random date and time in the past observing the given limits.
     *
     */
    public static function inThePast(string $range = '1 day', self $instance = null) : static
    {
        $instance ??= static::now();

        $matches = Text::contains($range, '-')
            ? Regex::match('/^(\d+)\s?-\s?(\d+)\s(.+)(?<!s)/', $range)
            : Regex::match('/^((\d+))\s(.+)(?<!s)/', $range);

        $to = $instance->sub("{$matches[1]} {$matches[3]}");

        $from = Text::contains($range, '-') ? $instance->sub("{$matches[2]} {$matches[3]}") : $instance;

        $seconds = $instance->faker()->numberBetween($from->getTimestamp(), $to->getTimestamp());

        return $instance->setTimestamp($seconds);
    }

    /**
     * Create an array of instances using the given range.
     *
     */
    public static function period(self $from, self $to) : array
    {
        return Collection::make(CarbonPeriodImmutable::create($from, $to)->toArray())
            ->transform(fn($item) => static::instance($item))
            ->toArray();
    }

    /**
     * Ensure that Laravel always uses an immutable Carbon instance.
     *
     */
    public static function useImmutable() : void
    {
        Facade::use(static::class);
    }

    /**
     * Format the instance as a human-friendly time.
     *
     */
    public function time() : string
    {
        return $this->format('g:i');
    }
}
