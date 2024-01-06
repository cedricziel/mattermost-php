<?php

namespace Attachments;

use CedricZiel\MattermostPhp\Attachments\Attachment;
use CedricZiel\MattermostPhp\Attachments\Field;
use CedricZiel\MattermostPhp\SlashCommands\Action;
use CedricZiel\MattermostPhp\SlashCommands\ActionIntegration;
use CedricZiel\MattermostPhp\SlashCommands\SelectAction;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use CedricZiel\MattermostPhp\Test\MattermostTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(Attachment::class)]
class AttachmentTest extends MattermostTestCase
{
    #[Test]
    public function canSerialize()
    {
        $tooActionContext = new \stdClass();
        $tooActionContext->foo = 'bar';

        $attachment = new Attachment(
            fallback: 'Fallback',
            text: 'Text',
            actions: [
                new Action(
                    id: 'tooot',
                    name: 'Tooot',
                    integration: new ActionIntegration(
                        url: 'https://example.com',
                        context: $tooActionContext,
                    ),
                ),
            ],
            color: '#ff0000',
            pretext: 'Pretext',
            fields: [
                new Field(
                    title: 'Title',
                    value: 'Value',
                    short: true,
                ),
            ],
        );

        $json = json_encode($attachment);
        self::assertJson($json);
        self::assertJsonStringEqualsJsonString(
            <<<JSON
{
  "actions": [
    {
      "id": "tooot",
      "name": "Tooot",
      "integration": {
        "url": "https:\/\/example.com",
        "context": {
          "foo": "bar"
        }
      }
    }
  ],
  "fallback":"Fallback",
  "text":"Text",
  "color":"#ff0000",
  "pretext":"Pretext",
  "fields":[
    {"title":"Title","value":"Value","short":true}
  ]
 }
JSON,
            $json,
        );
    }

    #[Test]
    public function canSerializeSelectAction() {
        $json = <<<JSON
{
  "attachments": [
    {
     "fallback": "Foo",
      "pretext": "This is the attachment pretext.",
      "text": "This is the attachment text.",
      "actions": [
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
          "options": [
            {
              "text": "Option1",
              "value": "opt1"
            },
            {
              "text": "Option2",
              "value": "opt2"
            },
            {
              "text": "Option3",
              "value": "opt3"
            }
          ]
        }
      ]
    }
  ],
  "response_type": "ephemeral"
}
JSON;

        $o = new SlashCommandOutput(
            attachments: [
                new Attachment(
                    fallback: 'Foo',
                    text: 'This is the attachment text.',
                    actions: [
                        new SelectAction(
                            id: 'actionoptions',
                            name: 'Select an option...',
                            integration: new ActionIntegration(
                                url: 'http://127.0.0.1:7357/actionoptions',
                                context: (object) [
                                    'action' => 'do_something',
                                ],
                            ),
                            options: [
                                (object) [
                                    'text' => 'Option1',
                                    'value' => 'opt1',
                                ],
                                (object) [
                                    'text' => 'Option2',
                                    'value' => 'opt2',
                                ],
                                (object) [
                                    'text' => 'Option3',
                                    'value' => 'opt3',
                                ],
                            ],
                        ),
                    ],
                    pretext: 'This is the attachment pretext.',
                ),
            ],
        );

        $serialized = json_encode($o);

        self::assertJson($serialized);
        self::assertJsonStringEqualsJsonString($json, $serialized);
    }
}
