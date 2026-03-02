<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class FilesEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;
    use \CedricZiel\MattermostPhp\Client\MultipartTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
        ?\Psr\Http\Message\StreamFactoryInterface $streamFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;
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
     * __Minimum server version__: 9.4
     * Starting with server version 9.4 when uploading a file for a channel bookmark, the bookmark=true query parameter should be included in the query string
     *
     * ##### Permissions
     * Must have `upload_file` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadFile(
        /** The name of the file to be uploaded */
        string $filename,
        /** A file to be uploaded (string|resource|\Psr\Http\Message\StreamInterface) */
        mixed $files,
        /** The ID of the channel that this file will be uploaded to */
        ?string $channel_id = null,
        /** A unique identifier for the file that will be returned in the response */
        ?string $client_ids = null,
    ): \CedricZiel\MattermostPhp\Client\Model\UploadFileResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultTooLargeResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['filename'] = $filename;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        // Build multipart form data
        $multipartFields = [];
        if ($files !== null) {
            $file_name = pathinfo($filename, PATHINFO_FILENAME);
            $multipartFields['files'] = ['contents' => $files, 'name' => $file_name, 'filename' => $filename];
        }
        if ($channel_id !== null) {
            $multipartFields['channel_id'] = $channel_id;
        }
        if ($client_ids !== null) {
            $multipartFields['client_ids'] = $client_ids;
        }

        $multipart = $this->createMultipartStream($multipartFields);
        $request = $request->withHeader('Content-Type', 'multipart/form-data; boundary=' . $multipart['boundary']);
        $request = $request->withBody($multipart['stream']);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\UploadFileResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[413] = \CedricZiel\MattermostPhp\Client\Model\DefaultTooLargeResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
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
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files/{file_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
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
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files/{file_id}/thumbnail', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
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
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files/{file_id}/preview', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetFileLinkResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files/{file_id}/link', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetFileLinkResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
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
    ): \CedricZiel\MattermostPhp\Client\Model\FileInfo|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files/{file_id}/info', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\FileInfo::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
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
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['file_id'] = $file_id;
        $queryParameters['h'] = $h;

        // build URI through path and query parameters
        $uri = $this->buildUri('/files/{file_id}/public', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
    }

    /**
     * Search files across the teams of the current user
     * Search for files in the teams of the current user based on file name, extention and file content (if file content extraction is enabled and supported for the files).
     * __Minimum server version__: 10.2
     * ##### Permissions
     * Must be authenticated and have the `view_team` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchFiles(
        /** The search terms as entered by the user. To search for files from a user include `from:someusername`, using a user's username. To search in a specific channel include `in:somechannel`, using the channel name (not the display name). To search for specific extensions include `ext:extension`. */
        string $terms,
        /** Set to true if an Or search should be performed vs an And search. */
        bool $is_or_search,
        /** Offset from UTC of user timezone for date searches. */
        ?int $time_zone_offset = null,
        /** Set to true if deleted channels should be included in the search. (archived channels) */
        ?bool $include_deleted_channels = null,
        /** The page to select. (Only works with Elasticsearch) */
        ?int $page = null,
        /** The number of posts per page. (Only works with Elasticsearch) */
        ?int $per_page = null,
    ): \CedricZiel\MattermostPhp\Client\Model\FileInfoList|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Response\BinaryResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/files/search', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        // Build multipart form data
        $multipartFields = [];
        $multipartFields['terms'] = $terms;
        $multipartFields['is_or_search'] = $is_or_search;
        if ($time_zone_offset !== null) {
            $multipartFields['time_zone_offset'] = $time_zone_offset;
        }
        if ($include_deleted_channels !== null) {
            $multipartFields['include_deleted_channels'] = $include_deleted_channels;
        }
        if ($page !== null) {
            $multipartFields['page'] = $page;
        }
        if ($per_page !== null) {
            $multipartFields['per_page'] = $per_page;
        }

        $multipart = $this->createMultipartStream($multipartFields);
        $request = $request->withHeader('Content-Type', 'multipart/form-data; boundary=' . $multipart['boundary']);
        $request = $request->withBody($multipart['stream']);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\FileInfoList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        $binaryMediaTypes = ['application/octet-stream'];

        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
    }
}
