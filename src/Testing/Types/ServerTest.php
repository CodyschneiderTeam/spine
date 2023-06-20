<?php

namespace System\Testing\Types;

use System\Testing\Configuration\Process;
use Illuminate\Foundation\Testing\TestCase;
use System\Testing\Configuration\Bootstrap;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServerTest extends TestCase
{
    use Process;
    use Bootstrap;
    use Conditionable;
    use RefreshDatabase;
}
