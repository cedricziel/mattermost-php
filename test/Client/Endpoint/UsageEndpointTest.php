<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\UsageEndpoint;
use CedricZiel\MattermostPhp\Client\Model\PostsUsage;
use CedricZiel\MattermostPhp\Client\Model\StorageUsage;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(UsageEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostsUsage::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StorageUsage::class)]
class UsageEndpointTest extends ClientTestCase
{
    public UsageEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new UsageEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPostsUsageBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['count' => 1234567890]);

        $result = $this->endpoint->getPostsUsage();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/usage/posts');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostsUsage::class, $result);
    }

    #[Test]
    public function getStorageUsageBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['bytes' => 1234567890]);

        $result = $this->endpoint->getStorageUsage();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/usage/storage');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StorageUsage::class, $result);
    }
}
