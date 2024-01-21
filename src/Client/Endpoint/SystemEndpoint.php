<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class SystemEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Retrieve a list of supported timezones
     * __Minimum server version__: 3.10
     * ##### Permissions
     * Must be logged in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSupportedTimezone(): array
    {
        $path = '/api/v4/system/timezones';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Check system health
     * Check if the server is up and healthy based on the configuration setting `GoRoutineHealthThreshold`. If `GoRoutineHealthThreshold` and the number of goroutines on the server exceeds that threshold the server is considered unhealthy. If `GoRoutineHealthThreshold` is not set or the number of goroutines is below the threshold the server is considered healthy.
     * __Minimum server version__: 3.10
     * If a "device_id" is passed in the query, it will test the Push Notification Proxy in order to discover whether the device is able to receive notifications. The response will have a "CanReceiveNotifications" property with one of the following values: - true: It can receive notifications - false: It cannot receive notifications - unknown: There has been an unknown error, and it is not certain whether it can
     *
     *   receive notifications.
     *
     * __Minimum server version__: 6.5
     * ##### Permissions
     * None.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPing(
        /** Check the status of the database and file storage as well */
        ?bool $get_server_status,
        /** Check whether this device id can receive push notifications */
        ?string $device_id,
    ): array
    {
        $path = '/api/v4/system/ping';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['get_server_status'] = $get_server_status;
        $queryParameters['device_id'] = $device_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get notices for logged in user in specified team
     * Will return appropriate product notices for current user in the team specified by teamId parameter.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be logged in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['clientVersion'] = $clientVersion;
        $queryParameters['locale'] = $locale;
        $queryParameters['client'] = $client;
        $pathParameters['teamId'] = $teamId;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Update notices as 'viewed'
     * Will mark the specified notices as 'viewed' by the logged in user.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be logged in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function markNoticesViewed(\MarkNoticesViewedRequest $requestBody): array
    {
        $path = '/api/v4/system/notices/view';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Recycle database connections
     * Recycle database connections by closing and reconnecting all connections to master and read replica databases.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function databaseRecycle(): array
    {
        $path = '/api/v4/database/recycle';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Send a test email
     * Send a test email to make sure you have your email settings configured correctly. Optionally provide a configuration in the request body to test. If no valid configuration is present in the request body the current server configuration will be tested.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function testEmail(\TestEmailRequest $requestBody): array
    {
        $path = '/api/v4/email/test';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Checks the validity of a Site URL
     * Sends a Ping request to the mattermost server using the specified Site URL.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.16
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function testSiteURL(\TestSiteURLRequest $requestBody): array
    {
        $path = '/api/v4/site_url/test';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Test AWS S3 connection
     * Send a test to validate if can connect to AWS S3. Optionally provide a configuration in the request body to test. If no valid configuration is present in the request body the current server configuration will be tested.
     * ##### Permissions
     * Must have `manage_system` permission.
     * __Minimum server version__: 4.8
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function testS3Connection(\TestS3ConnectionRequest $requestBody): array
    {
        $path = '/api/v4/file/s3_test';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get configuration
     * Retrieve the current server configuration
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getConfig(): array
    {
        $path = '/api/v4/config';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Update configuration
     * Submit a new configuration for the server to use. As of server version 4.8, the `PluginSettings.EnableUploads` setting cannot be modified by this endpoint.
     * Note that the parameters that aren't set in the configuration that you provide will be reset to default values. Therefore, if you want to change a configuration parameter and leave the other ones unchanged, you need to get the existing configuration first, change the field that you want, then put that new configuration.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateConfig(\UpdateConfigRequest $requestBody): array
    {
        $path = '/api/v4/config';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Reload configuration
     * Reload the configuration file to pick up on any changes made to it.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function reloadConfig(): array
    {
        $path = '/api/v4/config/reload';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get client configuration
     * Get a subset of the server configuration needed by the client.
     * ##### Permissions
     * No permission required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getClientConfig(
        /** Must be `old`, other formats not implemented yet */
        string $format,
    ): array
    {
        $path = '/api/v4/config/client';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['format'] = $format;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get configuration made through environment variables
     * Retrieve a json object mirroring the server configuration where fields are set to true
     * if the corresponding config setting is set through an environment variable. Settings
     * that haven't been set through environment variables will be missing from the object.
     *
     * __Minimum server version__: 4.10
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getEnvironmentConfig(): array
    {
        $path = '/api/v4/config/environment';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Patch configuration
     * Submit configuration to patch. As of server version 4.8, the `PluginSettings.EnableUploads` setting cannot be modified by this endpoint.
     * ##### Permissions
     * Must have `manage_system` permission.
     * __Minimum server version__: 5.20
     * ##### Note
     * The Plugins are stored as a map, and since a map may recursively go  down to any depth, individual fields of a map are not changed.  Consider using the `update config` (PUT api/v4/config) endpoint to update a plugins configurations.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchConfig(\PatchConfigRequest $requestBody): array
    {
        $path = '/api/v4/config/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Upload license file
     * Upload a license to enable enterprise features.
     *
     * __Minimum server version__: 4.0
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadLicenseFile(): array
    {
        $path = '/api/v4/license';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Remove license file
     * Remove the license file from the server. This will disable all enterprise features.
     *
     * __Minimum server version__: 4.0
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeLicenseFile(): array
    {
        $path = '/api/v4/license';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get client license
     * Get a subset of the server license needed by the client.
     * ##### Permissions
     * No permission required but having the `manage_system` permission returns more information.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getClientLicense(
        /** Must be `old`, other formats not implemented yet */
        string $format,
    ): array
    {
        $path = '/api/v4/license/client';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['format'] = $format;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Request the license renewal link
     * Request the renewal link that would be used to start the license renewal process
     * __Minimum server version__: 5.32
     * ##### Permissions
     * Must have `sysconsole_write_about` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function requestLicenseRenewalLink(): array
    {
        $path = '/api/v4/license/renewal';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Request and install a trial license for your server
     * Request and install a trial license for your server
     * __Minimum server version__: 5.25
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function requestTrialLicense(\RequestTrialLicenseRequest $requestBody): array
    {
        $path = '/api/v4/trial-license';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get last trial license used
     * Get the last trial license used on the sevrer
     * __Minimum server version__: 5.36
     * ##### Permissions
     * Must have `manage_systems` permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPrevTrialLicense(): array
    {
        $path = '/api/v4/trial-license/prev';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get audits
     * Get a page of audits for all users on the system, selected with `page` and `per_page` query parameters.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAudits(
        /** The page to select. */
        ?int $page = 0,
        /** The number of audits per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/audits';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Invalidate all the caches
     * Purge all the in-memory caches for the Mattermost server. This can have a temporary negative effect on performance while the caches are re-populated.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function invalidateCaches(): array
    {
        $path = '/api/v4/caches/invalidate';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get logs
     * Get a page of server logs, selected with `page` and `logs_per_page` query parameters.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getLogs(
        /** The page to select. */
        ?int $page = 0,
        /** The number of logs per page. There is a maximum limit of 10000 logs per page. */
        ?string $logs_per_page = '10000',
    ): array
    {
        $path = '/api/v4/logs';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['logs_per_page'] = $logs_per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Add log message
     * Add log messages to the server logs.
     * ##### Permissions
     * Users with `manage_system` permission can log ERROR or DEBUG messages.
     * Logged in users can log ERROR or DEBUG messages when `ServiceSettings.EnableDeveloper` is `true` or just DEBUG messages when `false`.
     * Non-logged in users can log ERROR or DEBUG messages when `ServiceSettings.EnableDeveloper` is `true` and cannot log when `false`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function postLog(\PostLogRequest $requestBody): array
    {
        $path = '/api/v4/logs';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get analytics
     * Get some analytics data about the system. This endpoint uses the old format, the `/analytics` route is reserved for the new format when it gets implemented.
     *
     * The returned JSON changes based on the `name` query parameter but is always key/value pairs.
     *
     * __Minimum server version__: 4.0
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAnalyticsOld(
        /** Possible values are "standard", "bot_post_counts_day", "post_counts_day", "user_counts_with_posts_day" or "extra_counts" */
        ?string $name = 'standard',
        /** The team ID to filter the data by */
        ?string $team_id,
    ): array
    {
        $path = '/api/v4/analytics/old';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['name'] = $name;
        $queryParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Set the server busy (high load) flag
     * Marks the server as currently having high load which disables non-critical services such as search, statuses and typing notifications.
     *
     * __Minimum server version__: 5.20
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setServerBusy(
        /** Number of seconds until server is automatically marked as not busy. */
        ?string $seconds = '3600',
    ): array
    {
        $path = '/api/v4/server_busy';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['seconds'] = $seconds;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get server busy expiry time.
     * Gets the timestamp corresponding to when the server busy flag will be automatically cleared.
     *
     * __Minimum server version__: 5.20
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getServerBusyExpires(): array
    {
        $path = '/api/v4/server_busy';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Clears the server busy (high load) flag
     * Marks the server as not having high load which re-enables non-critical services such as search, statuses and typing notifications.
     *
     * __Minimum server version__: 5.20
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function clearServerBusy(): array
    {
        $path = '/api/v4/server_busy';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get redirect location
     * __Minimum server version__: 3.10
     * ##### Permissions
     * Must be logged in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRedirectLocation(
        /** Url to check */
        string $url,
    ): array
    {
        $path = '/api/v4/redirect_location';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['url'] = $url;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get an image by url
     * Fetches an image via Mattermost image proxy.
     * __Minimum server version__: 3.10
     * ##### Permissions
     * Must be logged in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getImageByUrl(): array
    {
        $path = '/api/v4/image';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Executes an inplace upgrade from Team Edition to Enterprise Edition
     * It downloads the Mattermost Enterprise Edition of your current version and replace your current version with it. After the upgrade you need to restart the Mattermost server.
     * __Minimum server version__: 5.27
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function upgradeToEnterprise(): array
    {
        $path = '/api/v4/upgrade_to_enterprise';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get the current status for the inplace upgrade from Team Edition to Enterprise Edition
     * It returns the percentage of completion of the current upgrade or the error if there is any.
     * __Minimum server version__: 5.27
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function upgradeToEnterpriseStatus(): array
    {
        $path = '/api/v4/upgrade_to_enterprise/status';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Restart the system after an upgrade from Team Edition to Enterprise Edition
     * It restarts the current running mattermost instance to execute the new Enterprise binary.
     * __Minimum server version__: 5.27
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function restartServer(): array
    {
        $path = '/api/v4/restart';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get the warn metrics status (enabled or disabled)
     * Get the status of a set of metrics (enabled or disabled) from the Systems table.
     *
     * The returned JSON contains the metrics that we need to warn the admin on with regard
     * to their status (we return the ones whose status is "true", which means that they are
     * in a "warnable" state - e.g. a threshold has been crossed or some other condition has
     * been fulfilled).
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     *
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getWarnMetricsStatus(): array
    {
        $path = '/api/v4/warn_metrics/status';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Acknowledge a warning of a metric status
     * Acknowledge a warning for the warn_metric_id metric crossing a threshold (or some
     * similar condition being fulfilled) - attempts to send an ack email to
     * acknowledge@mattermost.com and sets the "ack" status for all the warn metrics in the system.
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     *
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function sendWarnMetricAck(
        /** Warn Metric Id. */
        string $warn_metric_id,
        \SendWarnMetricAckRequest $requestBody,
    ): array
    {
        $path = '/api/v4/warn_metrics/ack/{warn_metric_id}';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['warn_metric_id'] = $warn_metric_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Request trial license and acknowledge a warning of a metric status
     * Request a trial license and acknowledge a warning for the warn_metric_id metric crossing a threshold (or some
     * similar condition being fulfilled) - sets the "ack" status for all the warn metrics in the system.
     *
     * __Minimum server version__: 5.28
     *
     * ##### Permissions
     *
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function sendTrialLicenseWarnMetricAck(
        /** Warn Metric Id. */
        string $warn_metric_id,
    ): array
    {
        $path = '/api/v4/warn_metrics/trial-license-ack/{warn_metric_id}';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['warn_metric_id'] = $warn_metric_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Perform a database integrity check
     * Performs a database integrity check.
     *
     *
     * __Note__: This check may temporarily harm system performance.
     *
     *
     * __Minimum server version__: 5.28.0
     *
     *
     * __Local mode only__: This endpoint is only available through [local mode](https://docs.mattermost.com/administration/mmctl-cli-tool.html#local-mode).
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function checkIntegrity(): array
    {
        $path = '/api/v4/integrity';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Download a zip file which contains helpful and useful information for troubleshooting your mattermost instance.
     * Download a zip file which contains helpful and useful information for troubleshooting your mattermost instance.
     * __Minimum server version: 5.32__
     * ##### Permissions
     * Must have any of the system console read permissions.
     * ##### License
     * Requires either a E10 or E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function generateSupportPacket(): array
    {
        $path = '/api/v4/system/support_packet';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Stores that the Plugin Marketplace has been visited by at least an admin.
     * Stores the system-level status that specifies that at least an admin has visited the in-product Plugin Marketplace.
     * __Minimum server version: 5.33__
     * ##### Permissions
     * Must have `manage_system` permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateMarketplaceVisitedByAdmin(\UpdateMarketplaceVisitedByAdminRequest $requestBody): array
    {
        $path = '/api/v4/plugins/marketplace/first_admin_visit';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}