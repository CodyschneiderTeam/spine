<?php

namespace Caneara\Spine\Types;

use Illuminate\Bus\Queueable;
use Caneara\Spine\Support\Str;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Bus\PendingDispatch;

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
     * The key to use for polling.
     *
     */
    public string $poll;

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

    /**
     * Dispatch the job with the given arguments and generate a poll key.
     *
     */
    public static function dispatchWithPolling(...$arguments) : string
    {
        new PendingDispatch(new static($id = Str::uuid(), ...$arguments));

        return $id;
    }
}
