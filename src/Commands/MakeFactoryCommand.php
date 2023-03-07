<?php

namespace Caneara\Spine\Commands;

use Illuminate\Database\Console\Factories\FactoryMakeCommand;

class MakeFactoryCommand extends FactoryMakeCommand
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
