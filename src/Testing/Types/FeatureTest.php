<?php

namespace Caneara\Spine\Testing\Types;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Traits\Conditionable;
use Caneara\Spine\Testing\Configuration\Process;
use Caneara\Spine\Testing\Configuration\Bootstrap;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTest extends TestCase
{
    use Process;
    use Bootstrap;
    use Conditionable;
    use RefreshDatabase;
}
