<?php

namespace CedricZiel\MattermostPhp\Test\Apps\Bindings;

use CedricZiel\MattermostPhp\Apps\Bindings\LocationBinding;
use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Apps\ExpandLevel;
use CedricZiel\MattermostPhp\Expand;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertInstanceOf;

#[CoversClass(LocationBinding::class)]
class LocationBindingsTest extends TestCase
{
    #[Test]
    public function canCreateLocationBinding()
    {
        $binding = LocationBinding::create('location', 'icon', 'hint', 'description');

        assertInstanceOf(LocationBinding::class, $binding);
        $this->assertEquals('location', $binding->getLocation());
        $this->assertEquals('icon', $binding->getIcon());
        $this->assertEquals('hint', $binding->getHint());
        $this->assertEquals('description', $binding->getDescription());
    }

    #[Test]
    public function canCreateLocationBindingWithSubmit()
    {
        $binding = LocationBinding::create('location', 'icon', 'hint', 'description')
            ->withSubmit(
                Call::create('submit')
                    ->withState(['state' => 'value'])
                    ->withExpand(
                        Expand::create()
                            ->withChannel(ExpandLevel::summary)
                    ),
            );
        $this->assertInstanceOf(Call::class, $binding->getSubmit());

        $this->assertEquals('location', $binding->getLocation());
        $this->assertEquals('icon', $binding->getIcon());
        $this->assertEquals('hint', $binding->getHint());
        $this->assertEquals('description', $binding->getDescription());
    }
}
