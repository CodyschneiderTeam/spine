<?php

namespace System\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeModelCommand extends ModelMakeCommand
{
    /**
     * Resolve the fully-qualified path to the stub.
     *
     */
    protected function resolveStubPath($stub) : string
    {
        return __DIR__ . "/../../{$stub}";
    }
}
