<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class BookmarksEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

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
     * Get channel bookmarks for Channel
     * __Minimum server version__: 9.5
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo[]
     */
    public function listChannelBookmarksForChannel(
        /** Channel GUID */
        string $channel_id,
        /**
         * Timestamp to filter the bookmarks with. If set, the
         * endpoint returns bookmarks that have been added, updated
         * or deleted since its value
         */
        ?int $bookmarks_since = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['bookmarks_since'] = $bookmarks_since;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/bookmarks', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create channel bookmark
     * Creates a new channel bookmark for this channel.
     *
     * __Minimum server version__: 9.5
     *
     * ##### Permissions
     * Must have the `add_bookmark_public_channel` or
     * `add_bookmark_private_channel` depending on the channel
     * type. If the channel is a DM or GM, must be a non-guest
     * member.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createChannelBookmark(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\CreateChannelBookmarkRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/bookmarks', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update channel bookmark
     * Partially update a channel bookmark by providing only the
     * fields you want to update. Ommited fields will not be
     * updated. The fields that can be updated are defined in the
     * request body, all other provided fields will be ignored.
     *
     * __Minimum server version__: 9.5
     *
     * ##### Permissions
     * Must have the `edit_bookmark_public_channel` or
     * `edit_bookmark_private_channel` depending on the channel
     * type. If the channel is a DM or GM, must be a non-guest
     * member.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannelBookmark(
        /** Channel GUID */
        string $channel_id,
        /** Bookmark GUID */
        string $bookmark_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelBookmarkRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\UpdateChannelBookmarkResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['bookmark_id'] = $bookmark_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/bookmarks/{bookmark_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdateChannelBookmarkResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete channel bookmark
     * Archives a channel bookmark. This will set the `deleteAt` to
     * the current timestamp in the database.
     *
     * __Minimum server version__: 9.5
     *
     * ##### Permissions
     * Must have the `delete_bookmark_public_channel` or
     * `delete_bookmark_private_channel` depending on the channel
     * type. If the channel is a DM or GM, must be a non-guest
     * member.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteChannelBookmark(
        /** Channel GUID */
        string $channel_id,
        /** Bookmark GUID */
        string $bookmark_id,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['bookmark_id'] = $bookmark_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/bookmarks/{bookmark_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update channel bookmark's order
     * Updates the order of a channel bookmark, setting its new order
     * from the parameters and updating the rest of the bookmarks of
     * the channel to accomodate for this change.
     *
     * __Minimum server version__: 9.5
     *
     * ##### Permissions
     * Must have the `order_bookmark_public_channel` or
     * `order_bookmark_private_channel` depending on the channel
     * type. If the channel is a DM or GM, must be a non-guest
     * member.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo[]
     */
    public function updateChannelBookmarkSortOrder(
        /** Channel GUID */
        string $channel_id,
        /** Bookmark GUID */
        string $bookmark_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelBookmarkSortOrderRequest $requestBody,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['bookmark_id'] = $bookmark_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/bookmarks/{bookmark_id}/sort_order', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }
}
