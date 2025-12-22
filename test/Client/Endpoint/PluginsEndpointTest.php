<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PluginsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetPluginsResponse;
use CedricZiel\MattermostPhp\Client\Model\InstallMarketplacePluginRequest;
use CedricZiel\MattermostPhp\Client\Model\MarketplacePlugin;
use CedricZiel\MattermostPhp\Client\Model\PluginManifest;
use CedricZiel\MattermostPhp\Client\Model\PluginManifestWebapp;
use CedricZiel\MattermostPhp\Client\Model\PluginStatus;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\System;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PluginsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetPluginsResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PluginManifestWebapp::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PluginStatus::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PluginManifest::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(MarketplacePlugin::class)]
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
    public function uploadPluginBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['status' => 'test-status']);

        $plugin = 'test-file-content';
        $force = 'test-force';

        $result = $this->endpoint->uploadPlugin($plugin, $force);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/plugins');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('plugin');
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getPluginsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['active' => [], 'inactive' => []]);

        $result = $this->endpoint->getPlugins();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/plugins');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetPluginsResponse::class, $result);
    }

    #[Test]
    public function installPluginFromUrlBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['status' => 'test-status']);

        $plugin_download_url = 'test-plugin_download_url';
        $force = 'test-force';

        $result = $this->endpoint->installPluginFromUrl($plugin_download_url, $force);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/plugins/install_from_url');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['plugin_download_url' => 'test-plugin_download_url', 'force' => 'test-force']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function removePluginBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $plugin_id = 'test-plugin_id';

        $result = $this->endpoint->removePlugin($plugin_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/plugins/test-plugin_id');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/plugins/test-plugin_id/enable');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/plugins/test-plugin_id/disable');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getWebappPluginsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'version' => 'test-version']]);

        $result = $this->endpoint->getWebappPlugins();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/plugins/webapp');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PluginManifestWebapp::class, $result[0]);
    }

    #[Test]
    public function getPluginStatusesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['plugin_id' => 'test-plugin_id', 'name' => 'test-name', 'description' => 'test-description', 'version' => 'test-version', 'cluster_id' => 'test-cluster_id', 'plugin_path' => 'test-plugin_path', 'state' => 1234567890]]);

        $result = $this->endpoint->getPluginStatuses();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/plugins/statuses');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PluginStatus::class, $result[0]);
    }

    #[Test]
    public function installMarketplacePluginBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'version' => 'test-version', 'min_server_version' => 'test-min_server_version']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\InstallMarketplacePluginRequest(id: 'test-id', version: 'test-version');

        $result = $this->endpoint->installMarketplacePlugin($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/plugins/marketplace');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PluginManifest::class, $result);
    }

    #[Test]
    public function getMarketplacePluginsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['homepage_url' => 'test-homepage_url', 'icon_data' => 'test-icon_data', 'download_url' => 'test-download_url', 'release_notes_url' => 'test-release_notes_url', 'labels' => [], 'signature' => 'test-signature', 'installed_version' => 'test-installed_version']]);

        $page = 1;
        $per_page = 1;
        $filter = 'test-filter';
        $server_version = 'test-server_version';
        $local_only = true;

        $result = $this->endpoint->getMarketplacePlugins($page, $per_page, $filter, $server_version, $local_only);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/plugins/marketplace');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'filter' => 'test-filter', 'server_version' => 'test-server_version', 'local_only' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\MarketplacePlugin::class, $result[0]);
    }

    #[Test]
    public function getMarketplaceVisitedByAdminBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['name' => 'test-name', 'value' => 'test-value']);

        $result = $this->endpoint->getMarketplaceVisitedByAdmin();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/plugins/marketplace/first_admin_visit');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\System::class, $result);
    }
}
