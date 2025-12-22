<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\Integration_actionsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\LookupInteractiveDialogRequest;
use CedricZiel\MattermostPhp\Client\Model\LookupInteractiveDialogResponse;
use CedricZiel\MattermostPhp\Client\Model\OpenInteractiveDialogRequest;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\SubmitInteractiveDialogRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(Integration_actionsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(LookupInteractiveDialogResponse::class)]
class Integration_actionsEndpointTest extends ClientTestCase
{
    public Integration_actionsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new Integration_actionsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function openInteractiveDialogBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\OpenInteractiveDialogRequest(trigger_id: 'test-trigger_id', url: 'test-url', dialog: new \stdClass());

        $result = $this->endpoint->openInteractiveDialog($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/actions/dialogs/open');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function submitInteractiveDialogBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SubmitInteractiveDialogRequest(url: 'test-url', channel_id: 'test-channel_id', team_id: 'test-team_id', submission: new \stdClass());

        $result = $this->endpoint->submitInteractiveDialog($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/actions/dialogs/submit');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function lookupInteractiveDialogBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['options' => []]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\LookupInteractiveDialogRequest(url: 'test-url', channel_id: 'test-channel_id', team_id: 'test-team_id', submission: new \stdClass());

        $result = $this->endpoint->lookupInteractiveDialog($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/actions/dialogs/lookup');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\LookupInteractiveDialogResponse::class, $result);
    }
}
