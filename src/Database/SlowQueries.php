<?php

namespace System\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

class SlowQueries
{
    /**
     * Advise the error-tracking service to record all slow database queries.
     *
     */
    public static function setup() : void
    {
        $error   = 'SlowDatabaseQueryError';
        $message = 'The database query did not execute in a timely fashion.';

        $duration = Config::get('database.slow_query_duration', 5000);

        DB::whenQueryingForLongerThan($duration, function($source, $event) use ($error, $message) {
            Bugsnag::notifyError($error, $message, function($report) use ($event) {
                return $report->setSeverity('warning')->setMetaData([
                    'query' => [
                        'sql'      => $event->sql,
                        'bindings' => $event->bindings,
                    ],
                ]);
            });
        });
    }
}
