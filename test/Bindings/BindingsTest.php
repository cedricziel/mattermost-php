<?php

namespace CedricZiel\MattermostPhp\Test\Bindings;

use CedricZiel\MattermostPhp\Bindings\TopLevelBinding;
use CedricZiel\MattermostPhp\Location;
use CedricZiel\MattermostPhp\Test\MattermostTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TopLevelBinding::class)]
class BindingsTest extends MattermostTestCase
{
    public function testCanDeserializeBindings()
    {
        $json = <<<EOF
{
      "location": "/command",
      "bindings": [         
        {
          "location": "weather",
          "label": "Weather conditions",
          "description": "Show the weather conditions for today or the next week",
          "hint": "[day|week]",
          "bindings": [
            {
              "location": "day",
              "label": "Weather for today",
              "description": "Show the weather conditions for today",
              "submit": {
                "path": "/weather/day"
              }
            },
            {
              "location": "week",
              "label": "Weather for the next week",
              "description": "Show the weather conditions for the next week",
              "submit": {
                "path": "/weather/week"
              }
            }
          ]
        }
      ]
    }
EOF;
        /** @var TopLevelBinding $topLevelBinding */
        $topLevelBinding = $this->serializer->deserialize($json, TopLevelBinding::class, 'json');

        self::assertEquals(Location::command, $topLevelBinding->getLocation());
        self::assertEquals('weather', $topLevelBinding->getBindings()[0]->getLocation());
        self::assertEquals('Show the weather conditions for today or the next week', $topLevelBinding->getBindings()[0]->getDescription());

        self::assertEquals('day', $topLevelBinding->getBindings()[0]->getBindings()[0]->getLocation());
        self::assertEquals('/weather/day', $topLevelBinding->getBindings()[0]->getBindings()[0]->getSubmit()->getPath());

        self::assertEquals('week', $topLevelBinding->getBindings()[0]->getBindings()[1]->getLocation());
    }
}
