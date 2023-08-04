<?php

namespace System\Commands;

use Laravel\Dusk\Console\DuskCommand as Command;

class DuskCommand extends Command
{
    /**
     * Determine if Collision's printer should be used.
     *
     */
    protected function shouldUseCollisionPrinter()
    {
        return false;
    }
}
