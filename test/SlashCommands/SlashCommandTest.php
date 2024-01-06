<?php

namespace CedricZiel\MattermostPhp\Test\SlashCommands;

use CedricZiel\MattermostPhp\Attachments\Attachment;
use CedricZiel\MattermostPhp\Attachments\Field;
use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(AbstractSlashCommand::class)]
class SlashCommandTest extends TestCase
{
    #[Test]
    public function canHandleSimpleSlashCommand()
    {
        $slashCommand = new class extends AbstractSlashCommand {
            public function execute(SlashCommandInput $input): SlashCommandOutput
            {
                return new SlashCommandOutput('Hello World!');
            }
        };

        $request = new ServerRequest('POST', 'https://example.com/slash-command');
        $response = $slashCommand->handle($request);

        $jsonResponse = $response->getBody()->getContents();
        self::assertJson($jsonResponse);
        self::assertJsonStringEqualsJsonString(
            '{"response_type":"ephemeral","text":"Hello World!"}',
            $jsonResponse,
        );
    }

    #[Test]
    public function canHandleSlashCommandWithAttachments()
    {
        $slashCommand = new class extends AbstractSlashCommand {
            public function execute(SlashCommandInput $input): SlashCommandOutput
            {
                return new SlashCommandOutput(
                    'Hello World!',
                    attachments: [
                        new Attachment(
                            fallback: 'Fallback',
                            text: 'Text',
                            color: '#ff0000',
                            pretext: 'Pretext',
                            fields: [
                                new Field(
                                    title: 'Title',
                                    value: 'Value',
                                    short: true,
                                ),
                            ],
                        ),
                    ],
                );
            }
        };

        $request = new ServerRequest('POST', 'https://example.com/slash-command');
        $response = $slashCommand->handle($request);

        $jsonResponse = $response->getBody()->getContents();
        self::assertJson($jsonResponse);
        self::assertJsonStringEqualsJsonString(
            <<<JSON
{
  "response_type":"ephemeral",
  "text":"Hello World!",
  "attachments":[
    {
      "fallback":"Fallback",
      "text":"Text",
      "color":"#ff0000",
      "pretext":"Pretext",
      "fields":[
        {
          "title":"Title",
          "value":"Value",
          "short":true
        }
      ]
    }
  ]
}
JSON,
            $jsonResponse,
        );
    }
}
