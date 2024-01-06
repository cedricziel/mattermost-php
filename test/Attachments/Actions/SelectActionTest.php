<?php

namespace Attachments\Actions;

use CedricZiel\MattermostPhp\Attachments\Actions\ActionIntegration;
use CedricZiel\MattermostPhp\Attachments\Actions\SelectAction;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(SelectAction::class)]
class SelectActionTest extends TestCase
{
    #[Test]
    public function canSerialize()
    {
        $action = SelectAction::create(
            'actionoptions',
            'Select an option...',
            ActionIntegration::create('http://127.0.0.1:7357/actionoptions')
                ->withContext('action', 'do_something'),
        )
        ->addOption('option1', 'Option 1');

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
  "options": [
    {
      "text": "option1",
      "value": "Option 1"
    }
  ],
  "type": "select"
}
JSON;

        $actionJson = json_encode($action);

        self::assertJson($actionJson);
        self::assertJson($desiredJson);

        self::assertJsonStringEqualsJsonString($desiredJson, $actionJson);
    }
}
