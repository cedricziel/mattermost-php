<?php

namespace CedricZiel\MattermostPhp\Client;

class FilesEndpoint
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
     * Upload a file
     */
    public function uploadFile(
        /** The ID of the channel that this file will be uploaded to */
        ?string $channel_id,
        /** The name of the file to be uploaded */
        ?string $filename,
    ): array
    {
        $path = '/api/v4/files';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['filename'] = $filename;
        return [];
    }

    /**
     * Get a file
     */
    public function getFile(
        /** The ID of the file to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['file_id'] = $file_id;
        return [];
    }

    /**
     * Get a file's thumbnail
     */
    public function getFileThumbnail(
        /** The ID of the file to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/thumbnail';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['file_id'] = $file_id;
        return [];
    }

    /**
     * Get a file's preview
     */
    public function getFilePreview(
        /** The ID of the file to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/preview';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['file_id'] = $file_id;
        return [];
    }

    /**
     * Get a public file link
     */
    public function getFileLink(
        /** The ID of the file to get a link for */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/link';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['file_id'] = $file_id;
        return [];
    }

    /**
     * Get metadata for a file
     */
    public function getFileInfo(
        /** The ID of the file info to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/info';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['file_id'] = $file_id;
        return [];
    }

    /**
     * Get a public file
     */
    public function getFilePublic(
        /** The ID of the file to get */
        string $file_id,
        /** File hash */
        string $h,
    ): array
    {
        $path = '/files/{file_id}/public';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['file_id'] = $file_id;
        $queryParameters['h'] = $h;
        return [];
    }
}
;