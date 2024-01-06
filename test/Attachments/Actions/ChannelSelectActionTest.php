<?php

namespace CedricZiel\MattermostPhp\Test\Attachments\Actions;

use CedricZiel\MattermostPhp\Attachments\Actions\ActionIntegration;
use CedricZiel\MattermostPhp\Attachments\Actions\ChannelSelectAction;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(ChannelSelectAction::class)]
class ChannelSelectActionTest extends TestCase
{
    #[Test]
    public function canSerialize()
    {
        $action = ChannelSelectAction::create(
            'actionoptions',
            'Select an option...',
            ActionIntegration::create('http://127.0.0.1:7357/actionoptions')
                ->withContext('action', 'do_something'),
        );

        $desiredJson = <<<JSON
{
  "id": "actionoptions",
  "name": "Select an option...",
  "integration": {
    "url": "http://127.0.0.1:7357/actionoptions",
    "context": {
      "action": "do_something"
    }
  },
  "type": "select",
  "data_source": "channels"
}
JSON;

        $actionJson = json_encode($action);

        self::assertJson($actionJson);
        self::assertJson($desiredJson);

        self::assertJsonStringEqualsJsonString($desiredJson, $actionJson);
    }
}
