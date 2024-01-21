<?php

namespace CedricZiel\MattermostPhp\Client;

class PluginsEndpoint
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
     * Upload plugin
     */
    public function uploadPlugin(): array
    {
        $path = '/api/v4/plugins';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get plugins
     */
    public function getPlugins(): array
    {
        $path = '/api/v4/plugins';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Install plugin from url
     */
    public function installPluginFromUrl(
        /** URL used to download the plugin */
        string $plugin_download_url,
        /** Set to 'true' to overwrite a previously installed plugin with the same ID, if any */
        ?string $force,
    ): array
    {
        $path = '/api/v4/plugins/install_from_url';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['plugin_download_url'] = $plugin_download_url;
        $queryParameters['force'] = $force;
        return [];
    }

    /**
     * Remove plugin
     */
    public function removePlugin(
        /** Id of the plugin to be removed */
        string $plugin_id,
    ): array
    {
        $path = '/api/v4/plugins/{plugin_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['plugin_id'] = $plugin_id;
        return [];
    }

    /**
     * Enable plugin
     */
    public function enablePlugin(
        /** Id of the plugin to be enabled */
        string $plugin_id,
    ): array
    {
        $path = '/api/v4/plugins/{plugin_id}/enable';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['plugin_id'] = $plugin_id;
        return [];
    }

    /**
     * Disable plugin
     */
    public function disablePlugin(
        /** Id of the plugin to be disabled */
        string $plugin_id,
    ): array
    {
        $path = '/api/v4/plugins/{plugin_id}/disable';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['plugin_id'] = $plugin_id;
        return [];
    }

    /**
     * Get webapp plugins
     */
    public function getWebappPlugins(): array
    {
        $path = '/api/v4/plugins/webapp';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get plugins status
     */
    public function getPluginStatuses(): array
    {
        $path = '/api/v4/plugins/statuses';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Installs a marketplace plugin
     */
    public function installMarketplacePlugin(): array
    {
        $path = '/api/v4/plugins/marketplace';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Gets all the marketplace plugins
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
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter'] = $filter;
        $queryParameters['server_version'] = $server_version;
        $queryParameters['local_only'] = $local_only;
        return [];
    }

    /**
     * Get if the Plugin Marketplace has been visited by at least an admin.
     */
    public function getMarketplaceVisitedByAdmin(): array
    {
        $path = '/api/v4/plugins/marketplace/first_admin_visit';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;