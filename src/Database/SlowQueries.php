<?php

namespace Caneara\Spine\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

class SlowQueries
{
    /**
     * Advise the error-tracking service to record all slow database queries.
     *
     */
    public static function setup() : void
    {
        if (! App::isProduction()) {
            return;
        }

        $error   = 'SlowDatabaseQueryError';
        $message = 'The database query did not execute in a timely fashion.';

        DB::whenQueryingForLongerThan(1000, function($source, $event) use ($error, $message) {
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
