<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SystemEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Config;
use CedricZiel\MattermostPhp\Client\Model\EnvironmentConfig;
use CedricZiel\MattermostPhp\Client\Model\GetLicenseLoadMetricResponse;
use CedricZiel\MattermostPhp\Client\Model\LicenseRenewalLink;
use CedricZiel\MattermostPhp\Client\Model\Server_Busy;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\SystemStatusResponse;
use CedricZiel\MattermostPhp\Client\Model\UpgradeToEnterpriseStatusResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SystemEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SystemStatusResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Config::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(EnvironmentConfig::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetLicenseLoadMetricResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(LicenseRenewalLink::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Server_Busy::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UpgradeToEnterpriseStatusResponse::class)]
class SystemEndpointTest extends ClientTestCase
{
    public SystemEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new SystemEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPingBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['AndroidLatestVersion' => 'test-AndroidLatestVersion', 'AndroidMinVersion' => 'test-AndroidMinVersion', 'DesktopLatestVersion' => 'test-DesktopLatestVersion', 'DesktopMinVersion' => 'test-DesktopMinVersion', 'IosLatestVersion' => 'test-IosLatestVersion', 'IosMinVersion' => 'test-IosMinVersion', 'database_status' => 'test-database_status', 'filestore_status' => 'test-filestore_status', 'status' => 'test-status', 'CanReceiveNotifications' => 'test-CanReceiveNotifications']);

        $get_server_status = true;
        $device_id = 'test-device_id';
        $use_rest_semantics = true;

        $result = $this->endpoint->getPing($get_server_status, $device_id, $use_rest_semantics);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SystemStatusResponse::class, $result);
    }

    #[Test]
    public function getNoticesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $teamId = 'test-teamId';
        $clientVersion = 'test-clientVersion';
        $client = 'test-client';
        $locale = 'test-locale';

        $result = $this->endpoint->getNotices($teamId, $clientVersion, $client, $locale);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function databaseRecycleBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->databaseRecycle();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function testNotificationBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->testNotification();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getConfigBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, []);

        $remove_masked = true;
        $remove_defaults = 'test-remove_defaults';

        $result = $this->endpoint->getConfig($remove_masked, $remove_defaults);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Config::class, $result);
    }

    #[Test]
    public function reloadConfigBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->reloadConfig();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getEnvironmentConfigBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, []);

        $result = $this->endpoint->getEnvironmentConfig();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\EnvironmentConfig::class, $result);
    }

    #[Test]
    public function getLicenseLoadMetricBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['load' => 1234567890]);

        $result = $this->endpoint->getLicenseLoadMetric();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetLicenseLoadMetricResponse::class, $result);
    }

    #[Test]
    public function requestLicenseRenewalLinkBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['renewal_link' => 'test-renewal_link']);

        $result = $this->endpoint->requestLicenseRenewalLink();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\LicenseRenewalLink::class, $result);
    }

    #[Test]
    public function getAuditsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getAudits($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function invalidateCachesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->invalidateCaches();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getServerBusyExpiresBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['busy' => true, 'expires' => 1234567890]);

        $result = $this->endpoint->getServerBusyExpires();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Server_Busy::class, $result);
    }

    #[Test]
    public function clearServerBusyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->clearServerBusy();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function upgradeToEnterpriseStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['percentage' => 1234567890, 'error' => 'test-error']);

        $result = $this->endpoint->upgradeToEnterpriseStatus();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UpgradeToEnterpriseStatusResponse::class, $result);
    }

    #[Test]
    public function restartServerBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->restartServer();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function checkIntegrityBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $result = $this->endpoint->checkIntegrity();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
