<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\UploadsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateUploadRequest;
use CedricZiel\MattermostPhp\Client\Model\UploadSession;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(UploadsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UploadSession::class)]
class UploadsEndpointTest extends ClientTestCase
{
    public UploadsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new UploadsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createUploadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'type' => 'test-type', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'filename' => 'test-filename', 'file_size' => 1234567890, 'file_offset' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateUploadRequest(channel_id: 'test-channel_id', filename: 'test-filename', file_size: 1234567890);

        $result = $this->endpoint->createUpload($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/uploads');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UploadSession::class, $result);
    }
}
