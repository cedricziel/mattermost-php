<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PlaybookAutofollowsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\PlaybookAutofollows;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PlaybookAutofollowsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookAutofollows::class)]
class PlaybookAutofollowsEndpointTest extends ClientTestCase
{
    public PlaybookAutofollowsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PlaybookAutofollowsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAutoFollowsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890, 'items' => []]);

        $id = 'test-id';

        $result = $this->endpoint->getAutoFollows($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id/autofollows');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookAutofollows::class, $result);
    }
}
