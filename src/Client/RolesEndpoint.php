<?php

namespace CedricZiel\MattermostPhp\Client;

class RolesEndpoint
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
     * Get a list of all the roles
     */
    public function getAllRoles(): array
    {
        $path = '/api/v4/roles';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a role
     */
    public function getRole(
        /** Role GUID */
        string $role_id,
    ): array
    {
        $path = '/api/v4/roles/{role_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['role_id'] = $role_id;
        return [];
    }

    /**
     * Get a role
     */
    public function getRoleByName(
        /** Role Name */
        string $role_name,
    ): array
    {
        $path = '/api/v4/roles/name/{role_name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['role_name'] = $role_name;
        return [];
    }

    /**
     * Patch a role
     */
    public function patchRole(
        /** Role GUID */
        string $role_id,
    ): array
    {
        $path = '/api/v4/roles/{role_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['role_id'] = $role_id;
        return [];
    }

    /**
     * Get a list of roles by name
     */
    public function getRolesByNames(): array
    {
        $path = '/api/v4/roles/names';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;