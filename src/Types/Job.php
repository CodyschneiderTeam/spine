<?php

namespace System\Types;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Job implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    /**
     * Delete the job if its models no longer exist.
     *
     */
    public bool $deleteWhenMissingModels = true;

    /**
     * The number of seconds the job can run before timing out.
     *
     */
    public int $timeout = 60;

    /**
     * The number of times the job may be attempted.
     *
     */
    public int $tries = 3;
}
