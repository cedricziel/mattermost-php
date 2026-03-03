<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SystemEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Audit;
use CedricZiel\MattermostPhp\Client\Model\Config;
use CedricZiel\MattermostPhp\Client\Model\EnvironmentConfig;
use CedricZiel\MattermostPhp\Client\Model\GetLicenseLoadMetricResponse;
use CedricZiel\MattermostPhp\Client\Model\IntegrityCheckResult;
use CedricZiel\MattermostPhp\Client\Model\LicenseRenewalLink;
use CedricZiel\MattermostPhp\Client\Model\MarkNoticesViewedRequest;
use CedricZiel\MattermostPhp\Client\Model\Notice;
use CedricZiel\MattermostPhp\Client\Model\PostLogRequest;
use CedricZiel\MattermostPhp\Client\Model\PostLogResponse;
use CedricZiel\MattermostPhp\Client\Model\PushNotification;
use CedricZiel\MattermostPhp\Client\Model\RequestTrialLicenseRequest;
use CedricZiel\MattermostPhp\Client\Model\Server_Busy;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\SystemStatusResponse;
use CedricZiel\MattermostPhp\Client\Model\TestSiteURLRequest;
use CedricZiel\MattermostPhp\Client\Model\UpgradeToEnterpriseStatusResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SystemEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SystemStatusResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Notice::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Config::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(EnvironmentConfig::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetLicenseLoadMetricResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(LicenseRenewalLink::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Audit::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostLogResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Server_Busy::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PushNotification::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UpgradeToEnterpriseStatusResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(IntegrityCheckResult::class)]
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/system/ping');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['get_server_status' => '1', 'device_id' => 'test-device_id', 'use_rest_semantics' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SystemStatusResponse::class, $result);
    }

    #[Test]
    public function getNoticesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'sysAdminOnly' => true, 'teamAdminOnly' => true, 'action' => 'test-action', 'actionParam' => 'test-actionParam', 'actionText' => 'test-actionText', 'description' => 'test-description', 'image' => 'test-image', 'title' => 'test-title']]);

        $teamId = 'test-teamId';
        $clientVersion = 'test-clientVersion';
        $client = 'test-client';
        $locale = 'test-locale';

        $result = $this->endpoint->getNotices($teamId, $clientVersion, $client, $locale);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/system/notices/test-teamId');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['clientVersion' => 'test-clientVersion', 'locale' => 'test-locale', 'client' => 'test-client']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Notice::class, $result[0]);
    }

    #[Test]
    public function markNoticesViewedBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\MarkNoticesViewedRequest(items: []);

        $result = $this->endpoint->markNoticesViewed($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/system/notices/view');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function databaseRecycleBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->databaseRecycle();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/database/recycle');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function testNotificationBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->testNotification();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/notifications/test');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function testSiteURLBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\TestSiteURLRequest(site_url: 'test-site_url');

        $result = $this->endpoint->testSiteURL($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/site_url/test');
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/config');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['remove_masked' => '1', 'remove_defaults' => 'test-remove_defaults']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Config::class, $result);
    }

    #[Test]
    public function reloadConfigBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->reloadConfig();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/config/reload');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getEnvironmentConfigBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, []);

        $result = $this->endpoint->getEnvironmentConfig();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/config/environment');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\EnvironmentConfig::class, $result);
    }

    #[Test]
    public function uploadLicenseFileBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['status' => 'test-status']);

        $license = 'test-file-content';

        $result = $this->endpoint->uploadLicenseFile($license);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/license');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('license');
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function removeLicenseFileBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $this->endpoint->removeLicenseFile();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/license');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getLicenseLoadMetricBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['load' => 1234567890]);

        $result = $this->endpoint->getLicenseLoadMetric();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/license/load_metric');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetLicenseLoadMetricResponse::class, $result);
    }

    #[Test]
    public function requestLicenseRenewalLinkBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['renewal_link' => 'test-renewal_link']);

        $result = $this->endpoint->requestLicenseRenewalLink();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/license/renewal');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\LicenseRenewalLink::class, $result);
    }

    #[Test]
    public function requestTrialLicenseBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RequestTrialLicenseRequest(users: 1234567890);

        $this->endpoint->requestTrialLicense($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/trial-license');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getAuditsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'action' => 'test-action', 'extra_info' => 'test-extra_info', 'ip_address' => 'test-ip_address', 'session_id' => 'test-session_id']]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getAudits($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/audits');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Audit::class, $result[0]);
    }

    #[Test]
    public function invalidateCachesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->invalidateCaches();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/caches/invalidate');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function postLogBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\PostLogRequest(level: 'test-level', message: 'test-message');

        $result = $this->endpoint->postLog($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/logs');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostLogResponse::class, $result);
    }

    #[Test]
    public function getServerBusyExpiresBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['busy' => true, 'expires' => 1234567890]);

        $result = $this->endpoint->getServerBusyExpires();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/server_busy');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Server_Busy::class, $result);
    }

    #[Test]
    public function clearServerBusyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->clearServerBusy();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/server_busy');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function upgradeToEnterpriseBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(202, ['ack_id' => 'test-ack_id', 'platform' => 'test-platform', 'server_id' => 'test-server_id', 'device_id' => 'test-device_id', 'post_id' => 'test-post_id', 'category' => 'test-category', 'sound' => 'test-sound', 'message' => 'test-message', 'badge' => 1234567890, 'cont_ava' => 1234567890, 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'channel_name' => 'test-channel_name', 'type' => 'test-type', 'sender_id' => 'test-sender_id', 'sender_name' => 'test-sender_name', 'override_username' => 'test-override_username', 'override_icon_url' => 'test-override_icon_url', 'from_webhook' => 'test-from_webhook', 'version' => 'test-version', 'is_id_loaded' => true]);

        $result = $this->endpoint->upgradeToEnterprise();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/upgrade_to_enterprise');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PushNotification::class, $result);
    }

    #[Test]
    public function upgradeToEnterpriseStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['percentage' => 1234567890, 'error' => 'test-error']);

        $result = $this->endpoint->upgradeToEnterpriseStatus();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/upgrade_to_enterprise/status');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UpgradeToEnterpriseStatusResponse::class, $result);
    }

    #[Test]
    public function isAllowedToUpgradeToEnterpriseBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $this->endpoint->isAllowedToUpgradeToEnterprise();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/upgrade_to_enterprise/allowed');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function restartServerBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->restartServer();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/restart');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function checkIntegrityBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['err' => 'test-err']]);

        $result = $this->endpoint->checkIntegrity();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/integrity');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\IntegrityCheckResult::class, $result[0]);
    }
}
