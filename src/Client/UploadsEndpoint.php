<?php

namespace CedricZiel\MattermostPhp\Client;

class UploadsEndpoint
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
     * Create an upload
     */
    public function createUpload(): array
    {
        $path = '/api/v4/uploads';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get an upload session
     */
    public function getUpload(
        /** The ID of the upload session to get. */
        string $upload_id,
    ): array
    {
        $path = '/api/v4/uploads/{upload_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['upload_id'] = $upload_id;
        return [];
    }

    /**
     * Perform a file upload
     */
    public function uploadData(
        /** The ID of the upload session the data belongs to. */
        string $upload_id,
    ): array
    {
        $path = '/api/v4/uploads/{upload_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['upload_id'] = $upload_id;
        return [];
    }
}
;