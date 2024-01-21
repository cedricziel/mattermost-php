<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class FilesEndpoint
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
     * Upload a file
     * Uploads a file that can later be attached to a post.
     *
     * This request can either be a multipart/form-data request with a channel_id, files and optional
     * client_ids defined in the FormData, or it can be a request with the channel_id and filename
     * defined as query parameters with the contents of a single file in the body of the request.
     *
     * Only multipart/form-data requests are supported by server versions up to and including 4.7.
     * Server versions 4.8 and higher support both types of requests.
     *
     * ##### Permissions
     * Must have `upload_file` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadFile(
        /** The ID of the channel that this file will be uploaded to */
        ?string $channel_id,
        /** The name of the file to be uploaded */
        ?string $filename,
    ): array
    {
        $path = '/api/v4/files';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['filename'] = $filename;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a file
     * Gets a file that has been uploaded previously.
     * ##### Permissions
     * Must have `read_channel` permission or be uploader of the file.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFile(
        /** The ID of the file to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a file's thumbnail
     * Gets a file's thumbnail.
     * ##### Permissions
     * Must have `read_channel` permission or be uploader of the file.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFileThumbnail(
        /** The ID of the file to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/thumbnail';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a file's preview
     * Gets a file's preview.
     * ##### Permissions
     * Must have `read_channel` permission or be uploader of the file.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFilePreview(
        /** The ID of the file to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/preview';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a public file link
     * Gets a public link for a file that can be accessed without logging into Mattermost.
     * ##### Permissions
     * Must have `read_channel` permission or be uploader of the file.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFileLink(
        /** The ID of the file to get a link for */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/link';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get metadata for a file
     * Gets a file's info.
     * ##### Permissions
     * Must have `read_channel` permission or be uploader of the file.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFileInfo(
        /** The ID of the file info to get */
        string $file_id,
    ): array
    {
        $path = '/api/v4/files/{file_id}/info';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a public file
     * ##### Permissions
     * No permissions required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFilePublic(
        /** The ID of the file to get */
        string $file_id,
        /** File hash */
        string $h,
    ): array
    {
        $path = '/files/{file_id}/public';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;
        $queryParameters['h'] = $h;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
