<?php

namespace CedricZiel\MattermostPhp\Client;

class SystemEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Retrieve a list of supported timezones
     */
    public function getSupportedTimezone(): array
    {
        $path = '/api/v4/system/timezones';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Check system health
     */
    public function getPing(
        /** Check the status of the database and file storage as well */
        ?bool $get_server_status,
        /** Check whether this device id can receive push notifications */
        ?string $device_id,
    ): array
    {
        $path = '/api/v4/system/ping';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['get_server_status'] = $get_server_status;
        $queryParameters['device_id'] = $device_id;
        return [];
    }

    /**
     * Get notices for logged in user in specified team
     */
    public function getNotices(
        /** Version of the client (desktop/mobile/web) that issues the request */
        string $clientVersion,
        /** Client locale */
        ?string $locale,
        /** Client type (web/mobile-ios/mobile-android/desktop) */
        string $client,
        /** ID of the team */
        string $teamId,
    ): array
    {
        $path = '/api/v4/system/notices/{teamId}';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['clientVersion'] = $clientVersion;
        $queryParameters['locale'] = $locale;
        $queryParameters['client'] = $client;
        $pathParameters['teamId'] = $teamId;
        return [];
    }

    /**
     * Update notices as 'viewed'
     */
    public function markNoticesViewed(): array
    {
        $path = '/api/v4/system/notices/view';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Recycle database connections
     */
    public function databaseRecycle(): array
    {
        $path = '/api/v4/database/recycle';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Send a test email
     */
    public function testEmail(): array
    {
        $path = '/api/v4/email/test';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Checks the validity of a Site URL
     */
    public function testSiteURL(): array
    {
        $path = '/api/v4/site_url/test';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Test AWS S3 connection
     */
    public function testS3Connection(): array
    {
        $path = '/api/v4/file/s3_test';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get configuration
     */
    public function getConfig(): array
    {
        $path = '/api/v4/config';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update configuration
     */
    public function updateConfig(): array
    {
        $path = '/api/v4/config';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Reload configuration
     */
    public function reloadConfig(): array
    {
        $path = '/api/v4/config/reload';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get client configuration
     */
    public function getClientConfig(
        /** Must be `old`, other formats not implemented yet */
        string $format,
    ): array
    {
        $path = '/api/v4/config/client';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['format'] = $format;
        return [];
    }

    /**
     * Get configuration made through environment variables
     */
    public function getEnvironmentConfig(): array
    {
        $path = '/api/v4/config/environment';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Patch configuration
     */
    public function patchConfig(): array
    {
        $path = '/api/v4/config/patch';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload license file
     */
    public function uploadLicenseFile(): array
    {
        $path = '/api/v4/license';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Remove license file
     */
    public function removeLicenseFile(): array
    {
        $path = '/api/v4/license';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get client license
     */
    public function getClientLicense(
        /** Must be `old`, other formats not implemented yet */
        string $format,
    ): array
    {
        $path = '/api/v4/license/client';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['format'] = $format;
        return [];
    }

    /**
     * Request the license renewal link
     */
    public function requestLicenseRenewalLink(): array
    {
        $path = '/api/v4/license/renewal';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Request and install a trial license for your server
     */
    public function requestTrialLicense(): array
    {
        $path = '/api/v4/trial-license';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get last trial license used
     */
    public function getPrevTrialLicense(): array
    {
        $path = '/api/v4/trial-license/prev';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get audits
     */
    public function getAudits(
        /** The page to select. */
        ?int $page = 0,
        /** The number of audits per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/audits';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Invalidate all the caches
     */
    public function invalidateCaches(): array
    {
        $path = '/api/v4/caches/invalidate';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get logs
     */
    public function getLogs(
        /** The page to select. */
        ?int $page = 0,
        /** The number of logs per page. There is a maximum limit of 10000 logs per page. */
        ?string $logs_per_page = '10000',
    ): array
    {
        $path = '/api/v4/logs';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['logs_per_page'] = $logs_per_page;
        return [];
    }

    /**
     * Add log message
     */
    public function postLog(): array
    {
        $path = '/api/v4/logs';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get analytics
     */
    public function getAnalyticsOld(
        /** Possible values are "standard", "bot_post_counts_day", "post_counts_day", "user_counts_with_posts_day" or "extra_counts" */
        ?string $name = 'standard',
        /** The team ID to filter the data by */
        ?string $team_id,
    ): array
    {
        $path = '/api/v4/analytics/old';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['name'] = $name;
        $queryParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Set the server busy (high load) flag
     */
    public function setServerBusy(
        /** Number of seconds until server is automatically marked as not busy. */
        ?string $seconds = '3600',
    ): array
    {
        $path = '/api/v4/server_busy';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['seconds'] = $seconds;
        return [];
    }

    /**
     * Get server busy expiry time.
     */
    public function getServerBusyExpires(): array
    {
        $path = '/api/v4/server_busy';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Clears the server busy (high load) flag
     */
    public function clearServerBusy(): array
    {
        $path = '/api/v4/server_busy';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get redirect location
     */
    public function getRedirectLocation(
        /** Url to check */
        string $url,
    ): array
    {
        $path = '/api/v4/redirect_location';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['url'] = $url;
        return [];
    }

    /**
     * Get an image by url
     */
    public function getImageByUrl(): array
    {
        $path = '/api/v4/image';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Executes an inplace upgrade from Team Edition to Enterprise Edition
     */
    public function upgradeToEnterprise(): array
    {
        $path = '/api/v4/upgrade_to_enterprise';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get the current status for the inplace upgrade from Team Edition to Enterprise Edition
     */
    public function upgradeToEnterpriseStatus(): array
    {
        $path = '/api/v4/upgrade_to_enterprise/status';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Restart the system after an upgrade from Team Edition to Enterprise Edition
     */
    public function restartServer(): array
    {
        $path = '/api/v4/restart';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get the warn metrics status (enabled or disabled)
     */
    public function getWarnMetricsStatus(): array
    {
        $path = '/api/v4/warn_metrics/status';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Acknowledge a warning of a metric status
     */
    public function sendWarnMetricAck(
        /** Warn Metric Id. */
        string $warn_metric_id,
    ): array
    {
        $path = '/api/v4/warn_metrics/ack/{warn_metric_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['warn_metric_id'] = $warn_metric_id;
        return [];
    }

    /**
     * Request trial license and acknowledge a warning of a metric status
     */
    public function sendTrialLicenseWarnMetricAck(
        /** Warn Metric Id. */
        string $warn_metric_id,
    ): array
    {
        $path = '/api/v4/warn_metrics/trial-license-ack/{warn_metric_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['warn_metric_id'] = $warn_metric_id;
        return [];
    }

    /**
     * Perform a database integrity check
     */
    public function checkIntegrity(): array
    {
        $path = '/api/v4/integrity';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Download a zip file which contains helpful and useful information for troubleshooting your mattermost instance.
     */
    public function generateSupportPacket(): array
    {
        $path = '/api/v4/system/support_packet';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Stores that the Plugin Marketplace has been visited by at least an admin.
     */
    public function updateMarketplaceVisitedByAdmin(): array
    {
        $path = '/api/v4/plugins/marketplace/first_admin_visit';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;