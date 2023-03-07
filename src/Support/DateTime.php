<?php

namespace Caneara\Spine\Support;

use Carbon\CarbonImmutable;
use Illuminate\Support\Env;
use Carbon\Carbon as BaseCarbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Config;

class DateTime extends CarbonImmutable
{
    /**
     * The pre-defined formats.
     *
     */
    protected const FORMAT_DATE = 'M j, Y';
    protected const FORMAT_FULL = 'M j, Y - H:i';
    protected const FORMAT_TIME = 'H:i';

    /**
     * Format the instance as a human-friendly date.
     *
     */
    public function date() : string
    {
        return $this->format(static::FORMAT_DATE);
    }

    /**
     * Format the instance as a human-friendly date and time.
     *
     */
    public function dateTime() : string
    {
        return $this->setTimezone($this->zone())
            ->format(static::FORMAT_FULL);
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
        return $this->setTimezone($this->zone())
            ->format(static::FORMAT_TIME);
    }

    /**
     * Retrieve the current year.
     *
     */
    public static function year() : string
    {
        return date('Y');
    }

    /**
     * Retrieve the time zone to be used.
     *
     */
    protected function zone() : string
    {
        return Env::get('DUSK_TIME_ZONE', Config::get('app.timezone'));
    }
}
