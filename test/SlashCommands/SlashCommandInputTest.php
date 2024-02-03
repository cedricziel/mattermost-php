<?php

namespace CedricZiel\MattermostPhp\Test\SlashCommands;

use CedricZiel\MattermostPhp\Common\Attachments\Action;
use CedricZiel\MattermostPhp\Common\Attachments\Actions\ActionIntegration;
use CedricZiel\MattermostPhp\Common\Attachments\Attachment;
use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\Middleware\ParsingMiddleware;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(SlashCommandInput::class)]
class SlashCommandInputTest extends TestCase
{
    #[Test]
    public function canHandleSlashCommandAction()
    {
        $parsingMiddleware = new ParsingMiddleware();
        $slashCommand = new class extends AbstractSlashCommand {
            public function execute(SlashCommandInput $input): SlashCommandOutput
            {
                if ($input->getContext()->action === 'drink-tea') {
                    return SlashCommandOutput::create()
                        ->withUpdate(
                            SlashCommandOutput::create()
                                ->withText('Tea is great!')
                        )
                        ->withText('Tea is great!');
                }

                return SlashCommandOutput::create()
                    ->withText(sprintf('Hello What is up %s?', $input->getText()))
                    ->addAttachment(
                        Attachment::create('select a preference')
                            ->withText('What do you want to do?')
                            ->addAction(
                                Action::create(
                                    'drink-tea',
                                    'Drink Tea',
                                    ActionIntegration::create('https://example.com/slash-command')
                                        ->withContext('action', 'drink-tea')
                                ),
                            )
                    );
            }
        };

        $request = new ServerRequest(
            'POST',
            'https://example.com/slash-command',
            [
                'content-type' => ['application/x-www-form-urlencoded'],
            ],
            'channel_id=nuwj8tuj1j8m9m1meetx4r779r&channel_name=0-designs&command=%2Fpling&response_url=https%3A%2F%2Fmattermost.com%2Fhooks%2Fcommands%2F9a56rikmktrb8kge443jcxofgc&team_domain=default&team_id=knpx5yezhby8xd6qbnnm9t5sye&text=friend&token=c6zzkjo7pffypxqfn1zo76ykpw&trigger_id=ZmZoOGRzbnozZmZqcHhtZ3c5d2NxaG0xcmU6YzdoNms5cmhuM2RtZm05cGtxNTZub3hwNmM6MTcwNDU3NDUzODMxMDpNRVFDSURUV0JVQmtVc2ZjSzZrU1hSRi9xSGNuRkFyclVYZzRxQTBLaTR1NXJ6bnBBaUFaeWErYVpuNTdxdHBmd0RkMGFXaE9DNENUa01PY0pkZkcvK05PTm13dGNBPT0%3D&user_id=c7h6k9rhn3dmfm9pkq56noxp6c&user_name=cedric'
        );
        $response = $parsingMiddleware->process($request, $slashCommand);
        self::assertEquals(200, $response->getStatusCode());
        self::assertStringContainsString('Hello What is up friend?', $response->getBody()->getContents());

        $json = <<<JSON
{
    "user_id": "c7h6k9rhn3dmfm9pkq56noxp6c",
    "user_name": "cedric",
    "channel_id": "nuwj8tuj1j8m9m1meetx4r779r",
    "channel_name": "0-designs",
    "team_id": "knpx5yezhby8xd6qbnnm9t5sye",
    "team_domain": "default",
    "post_id": "wzn8egt5x7gmmytgnptgbz9prc",
    "trigger_id": "aDk3ZGVxcnM1dGYxOHAzbW43ZHllNTFoNWg6YzdoNms5cmhuM2RtZm05cGtxNTZub3hwNmM6MTcwNDU2Nzk2NzY3MjpNRVVDSVFEV2hPaVR5RGNBRThZRzBLU1crMElOOEJUNitnN0RTblE0QTMvamFPTnFkQUlnVnBKVkhYcitjOHdlbWdHL3h0a3hCTGlKYlljTEVZdjJRWEtDbTY3UGxIWT0=",
    "type": "",
    "data_source": "",
    "context": {
        "action": "drink-tea"
    }
}
JSON;

        $drinkTeaRequest = new ServerRequest(
            'POST',
            'https://example.com/slash-command',
            ['content-type' => ['application/json']],
            $json
        );
        $drinkTeaResponse = $parsingMiddleware->process($drinkTeaRequest, $slashCommand);

        self::assertStringContainsString('Tea is great!', $drinkTeaResponse->getBody()->getContents());
        self::assertEquals(200, $drinkTeaResponse->getStatusCode());
    }
}
