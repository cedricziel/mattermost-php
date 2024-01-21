<?php

namespace CedricZiel\MattermostPhp\Client;

class ExportsEndpoint
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
     * List export files
     */
    public function listExports(): array
    {
        $path = '/api/v4/exports';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Download an export file
     */
    public function downloadExport(
        /** The name of the export file to download */
        string $export_name,
    ): array
    {
        $path = '/api/v4/exports/{export_name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['export_name'] = $export_name;
        return [];
    }

    /**
     * Delete an export file
     */
    public function deleteExport(
        /** The name of the export file to delete */
        string $export_name,
    ): array
    {
        $path = '/api/v4/exports/{export_name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['export_name'] = $export_name;
        return [];
    }
}
;