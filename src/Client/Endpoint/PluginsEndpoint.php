<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PluginsEndpoint
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
     * Upload plugin
     * Upload a plugin that is contained within a compressed .tar.gz file. Plugins and plugin uploads must be enabled in the server's config settings.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadPlugin(): array
    {
        $path = '/api/v4/plugins';
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
     * Get plugins
     * Get a list of inactive and a list of active plugin manifests. Plugins must be enabled in the server's config settings.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlugins(): array
    {
        $path = '/api/v4/plugins';
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
     * Install plugin from url
     * Supply a URL to a plugin compressed in a .tar.gz file. Plugins must be enabled in the server's config settings.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function installPluginFromUrl(
        /** URL used to download the plugin */
        string $plugin_download_url,
        /** Set to 'true' to overwrite a previously installed plugin with the same ID, if any */
        ?string $force,
    ): array
    {
        $path = '/api/v4/plugins/install_from_url';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['plugin_download_url'] = $plugin_download_url;
        $queryParameters['force'] = $force;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Remove plugin
     * Remove the plugin with the provided ID from the server. All plugin files are deleted. Plugins must be enabled in the server's config settings.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removePlugin(
        /** Id of the plugin to be removed */
        string $plugin_id,
    ): array
    {
        $path = '/api/v4/plugins/{plugin_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['plugin_id'] = $plugin_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Enable plugin
     * Enable a previously uploaded plugin. Plugins must be enabled in the server's config settings.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function enablePlugin(
        /** Id of the plugin to be enabled */
        string $plugin_id,
    ): array
    {
        $path = '/api/v4/plugins/{plugin_id}/enable';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['plugin_id'] = $plugin_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Disable plugin
     * Disable a previously enabled plugin. Plugins must be enabled in the server's config settings.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function disablePlugin(
        /** Id of the plugin to be disabled */
        string $plugin_id,
    ): array
    {
        $path = '/api/v4/plugins/{plugin_id}/disable';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['plugin_id'] = $plugin_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get webapp plugins
     * Get a list of web app plugins installed and activated on the server.
     *
     * ##### Permissions
     * No permissions required.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getWebappPlugins(): array
    {
        $path = '/api/v4/plugins/webapp';
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
     * Get plugins status
     * Returns the status for plugins installed anywhere in the cluster
     *
     * ##### Permissions
     * No permissions required.
     *
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPluginStatuses(): array
    {
        $path = '/api/v4/plugins/statuses';
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
     * Installs a marketplace plugin
     * Installs a plugin listed in the marketplace server.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.16
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function installMarketplacePlugin(\InstallMarketplacePluginRequest $requestBody): array
    {
        $path = '/api/v4/plugins/marketplace';
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
     * Gets all the marketplace plugins
     * Gets all plugins from the marketplace server, merging data from locally installed plugins as well as prepackaged plugins shipped with the server.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.16
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getMarketplacePlugins(
        /** Page number to be fetched. (not yet implemented) */
        ?int $page,
        /** Number of item per page. (not yet implemented) */
        ?int $per_page,
        /** Set to filter plugins by ID, name, or description. */
        ?string $filter,
        /** Set to filter minimum plugin server version. (not yet implemented) */
        ?string $server_version,
        /** Set true to only retrieve local plugins. */
        ?bool $local_only,
    ): array
    {
        $path = '/api/v4/plugins/marketplace';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter'] = $filter;
        $queryParameters['server_version'] = $server_version;
        $queryParameters['local_only'] = $local_only;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get if the Plugin Marketplace has been visited by at least an admin.
     * Retrieves the status that specifies that at least one System Admin has visited the in-product Plugin Marketplace.
     * __Minimum server version: 5.33__
     * ##### Permissions
     * Must have `manage_system` permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getMarketplaceVisitedByAdmin(): array
    {
        $path = '/api/v4/plugins/marketplace/first_admin_visit';
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
}