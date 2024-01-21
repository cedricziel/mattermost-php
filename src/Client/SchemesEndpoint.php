<?php

namespace CedricZiel\MattermostPhp\Client;

class SchemesEndpoint
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
     * Get the schemes.
     */
    public function getSchemes(
        /** Limit the results returned to the provided scope, either `team` or `channel`. */
        ?string $scope = '',
        /** The page to select. */
        ?int $page = 0,
        /** The number of schemes per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/schemes';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['scope'] = $scope;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Create a scheme
     */
    public function createScheme(): array
    {
        $path = '/api/v4/schemes';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a scheme
     */
    public function getScheme(
        /** Scheme GUID */
        string $scheme_id,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['scheme_id'] = $scheme_id;
        return [];
    }

    /**
     * Delete a scheme
     */
    public function deleteScheme(
        /** ID of the scheme to delete */
        string $scheme_id,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['scheme_id'] = $scheme_id;
        return [];
    }

    /**
     * Patch a scheme
     */
    public function patchScheme(
        /** Scheme GUID */
        string $scheme_id,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['scheme_id'] = $scheme_id;
        return [];
    }

    /**
     * Get a page of teams which use this scheme.
     */
    public function getTeamsForScheme(
        /** Scheme GUID */
        string $scheme_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of teams per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}/teams';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['scheme_id'] = $scheme_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get a page of channels which use this scheme.
     */
    public function getChannelsForScheme(
        /** Scheme GUID */
        string $scheme_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of channels per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['scheme_id'] = $scheme_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }
}
;