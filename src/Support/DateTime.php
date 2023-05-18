<?php

namespace Caneara\Spine\Support;

use Carbon\CarbonImmutable;
use Carbon\Carbon as BaseCarbon;
use Illuminate\Support\Facades\Date;

class DateTime extends CarbonImmutable
{
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
        BaseCarbon::setTestNow(BaseCarbon::now()->startOfSecond());
    }

    /**
     * Generate a random date and time in the future observing the given limits.
     *
     */
    public static function inTheFuture(string $range = '1 day', DateTime $instance = null) : static
    {
        $instance ??= static::now();

        $matches = Str::contains($range, '-')
            ? Regex::match('/^(\d+)\s?-\s?(\d+)\s(.+)(?<!s)/', $range)
            : Regex::match('/^((\d+))\s(.+)(?<!s)/', $range);

        $to = $instance->add("{$matches[2]} {$matches[3]}");

        $from = Str::contains($range, '-') ? $instance->add("{$matches[1]} {$matches[3]}") : $instance;

        $seconds = Integer::random($from->getTimestamp(), $to->getTimestamp());

        return $instance->setTimestamp($seconds);
    }

    /**
     * Generate a random date and time in the past observing the given limits.
     *
     */
    public static function inThePast(string $range = '1 day', DateTime $instance = null) : static
    {
        $instance ??= static::now();

        $matches = Str::contains($range, '-')
            ? Regex::match('/^(\d+)\s?-\s?(\d+)\s(.+)(?<!s)/', $range)
            : Regex::match('/^((\d+))\s(.+)(?<!s)/', $range);

        $to = $instance->sub("{$matches[1]} {$matches[3]}");

        $from = Str::contains($range, '-') ? $instance->sub("{$matches[2]} {$matches[3]}") : $instance;

        $seconds = Integer::random($from->getTimestamp(), $to->getTimestamp());

        return $instance->setTimestamp($seconds);
    }

    /**
     * Ensure that Laravel always uses an immutable Carbon instance.
     *
     */
    public static function useImmutable() : void
    {
        Date::use(static::class);
    }

    /**
     * Format the instance as a human-friendly time.
     *
     */
    public function time() : string
    {
        return $this->format('g:i');
    }

    /**
     * Retrieve the current year.
     *
     */
    public static function year() : string
    {
        return date('Y');
    }
}
