<?php

namespace CedricZiel\MattermostPhp\Test\Attachments;

use CedricZiel\MattermostPhp\Attachments\Action;
use CedricZiel\MattermostPhp\Attachments\Actions\ActionIntegration;
use CedricZiel\MattermostPhp\Attachments\Actions\ChannelSelectAction;
use CedricZiel\MattermostPhp\Attachments\Actions\SelectAction;
use CedricZiel\MattermostPhp\Attachments\Attachment;
use CedricZiel\MattermostPhp\Attachments\Field;
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
        $attachmentJson = <<<JSON
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
JSON;

        $attachment = Attachment::create('Fallback')
            ->withText('Text')
            ->addAction(
                Action::create(
                    'tooot',
                    'Tooot',
                    ActionIntegration::create('https://example.com')
                        ->withContext('foo', 'bar'),
                )
            )
            ->withColor('#ff0000')
            ->withPretext('Pretext')
            ->addField(
                Field::create('Title', 'Value', true)
            );

        $json = json_encode($attachment);
        self::assertJson($json);
        self::assertJsonStringEqualsJsonString($attachmentJson, $json);
    }

    #[Test]
    public function canSerializeSelectAction()
    {
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
  "response_type": "ephemeral",
   "props": {}
}
JSON;

        $o = SlashCommandOutput::create()
            ->addAttachment(
                Attachment::create('Foo')
                    ->withPretext('This is the attachment pretext.')
                    ->withText('This is the attachment text.')
                    ->addAction(
                        SelectAction::create(
                            'actionoptions',
                            'Select an option...',
                            ActionIntegration::create('http://127.0.0.1:7357/actionoptions')
                                ->withContext('action', 'do_something'),
                        )
                        ->addOption('Option1', 'opt1')
                        ->addOption('Option2', 'opt2')
                        ->addOption('Option3', 'opt3')
                    )
            );

        $serialized = json_encode($o);

        self::assertJson($serialized);
        self::assertJsonStringEqualsJsonString($json, $serialized);
    }

    #[Test]
    public function canCreateChannelSelect()
    {
        $json = <<<JSON
{
  "attachments": [
    {
      "fallback": "Fallback",
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
          "data_source": "channels"
        }
      ]
    }
  ],
  "response_type": "ephemeral",
  "props": {}
}
JSON;

        $o = SlashCommandOutput::create()
            ->addAttachment(
                Attachment::create('Fallback')
                    ->withPretext('This is the attachment pretext.')
                    ->withText('This is the attachment text.')
                    ->addAction(
                        ChannelSelectAction::create(
                            'actionoptions',
                            'Select an option...',
                            ActionIntegration::create('http://127.0.0.1:7357/actionoptions')
                                ->withContext('action', 'do_something')
                        )
                    )
            );

        $outputJson = json_encode($o);

        self::assertJson($outputJson);
        self::assertJson($json);
        self::assertJsonStringEqualsJsonString($json, $outputJson);
    }
}
