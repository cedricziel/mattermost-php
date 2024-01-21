<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class UploadsEndpoint
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
     * Create an upload
     * Creates a new upload session.
     *
     * __Minimum server version__: 5.28
     * ##### Permissions
     * Must have `upload_file` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createUpload(\CreateUploadRequest $requestBody): array
    {
        $path = '/api/v4/uploads';
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
     * Get an upload session
     * Gets an upload session that has been previously created.
     *
     * ##### Permissions
     * Must be logged in as the user who created the upload session.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUpload(
        /** The ID of the upload session to get. */
        string $upload_id,
    ): array
    {
        $path = '/api/v4/uploads/{upload_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['upload_id'] = $upload_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Perform a file upload
     * Starts or resumes a file upload.
     * To resume an existing (incomplete) upload, data should be sent starting from the offset specified in the upload session object.
     *
     * The request body can be in one of two formats:
     * - Binary file content streamed in request's body
     * - multipart/form-data
     *
     * ##### Permissions
     * Must be logged in as the user who created the upload session.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadData(
        /** The ID of the upload session the data belongs to. */
        string $upload_id,
    ): array
    {
        $path = '/api/v4/uploads/{upload_id}';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['upload_id'] = $upload_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
