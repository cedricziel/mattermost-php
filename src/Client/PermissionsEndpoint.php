<?php

namespace CedricZiel\MattermostPhp\Client;

class PermissionsEndpoint
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
     * Return all system console subsection ancillary permissions
     */
    public function getAncillaryPermissions(
        /**
         * The subsection permissions to return the ancillary permissions for. These values are comma seperated. Ex. subsection_permissions=sysconsole_read_reporting_site_statistics,sysconsole_write_reporting_site_statistics,sysconsole_write_user_management_channels
         */
        ?string $subsection_permissions,
    ): array
    {
        $path = '/api/v4/permissions/ancillary';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['subsection_permissions'] = $subsection_permissions;
        return [];
    }
}
;