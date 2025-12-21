<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PluginsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetPluginsResponse;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\System;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PluginsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetPluginsResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(System::class)]
class PluginsEndpointTest extends ClientTestCase
{
    public PluginsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PluginsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPluginsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['active' => [], 'inactive' => []]);

        $result = $this->endpoint->getPlugins();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetPluginsResponse::class, $result);
    }

    #[Test]
    public function removePluginBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $plugin_id = 'test-plugin_id';

        $result = $this->endpoint->removePlugin($plugin_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function enablePluginBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $plugin_id = 'test-plugin_id';

        $result = $this->endpoint->enablePlugin($plugin_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function disablePluginBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $plugin_id = 'test-plugin_id';

        $result = $this->endpoint->disablePlugin($plugin_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getWebappPluginsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $result = $this->endpoint->getWebappPlugins();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPluginStatusesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $result = $this->endpoint->getPluginStatuses();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getMarketplacePluginsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;
        $filter = 'test-filter';
        $server_version = 'test-server_version';
        $local_only = true;

        $result = $this->endpoint->getMarketplacePlugins($page, $per_page, $filter, $server_version, $local_only);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getMarketplaceVisitedByAdminBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['name' => 'test-name', 'value' => 'test-value']);

        $result = $this->endpoint->getMarketplaceVisitedByAdmin();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\System::class, $result);
    }
}
