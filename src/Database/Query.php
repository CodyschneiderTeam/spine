<?php

namespace System\Database;

use Closure;
use System\Support\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class Query
{
    /**
     * Execute the given (write-based) database query.
     *
     */
    public static function run(Closure $action) : mixed
    {
        $delay    = App::isProduction() ? 250 : 0;
        $retries  = App::isProduction() ? 40 : 0;
        $attempts = App::isProduction() ? 10 : 1;

        $closure = fn() => DB::transaction($action, $attempts);

        return Util::retry($retries, $closure, $delay);
    }
}
