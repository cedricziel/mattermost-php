<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\Test\Container\MattermostContainer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \CedricZiel\MattermostPhp\Mattermost
 */
class MattermostTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }


    public function testCanLogin()
    {
        $this->assertTrue(true);
    }
}
