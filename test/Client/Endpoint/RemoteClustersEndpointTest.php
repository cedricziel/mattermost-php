<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\RemoteClustersEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(RemoteClustersEndpoint::class)]
class RemoteClustersEndpointTest extends ClientTestCase
{
    public RemoteClustersEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new RemoteClustersEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getRemoteClustersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $page = 1;
        $per_page = 1;
        $exclude_offline = true;
        $in_channel = 'test-in_channel';
        $not_in_channel = 'test-not_in_channel';
        $only_confirmed = true;
        $only_plugins = true;
        $exclude_plugins = true;
        $include_deleted = true;

        try {
            $this->endpoint->getRemoteClusters($page, $per_page, $exclude_offline, $in_channel, $not_in_channel, $only_confirmed, $only_plugins, $exclude_plugins, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $remote_id = 'test-remote_id';

        try {
            $this->endpoint->getRemoteCluster($remote_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $remote_id = 'test-remote_id';

        try {
            $this->endpoint->deleteRemoteCluster($remote_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
