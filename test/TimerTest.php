<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Timer;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Timer::class)]
class TimerTest extends MattermostTestCase
{
    public function testCanCreateTimer()
    {
        $timer = Timer::create(new \DateTime(), new Call('/foo'));

        $this->assertInstanceOf(Timer::class, $timer);
    }
}
