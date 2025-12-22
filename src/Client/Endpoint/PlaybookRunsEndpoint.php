<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PlaybookRunsEndpoint
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
     * List all playbook runs
     * Retrieve a paged list of playbook runs, filtered by team, status, owner, name and/or members, and sorted by ID, name, status, creation date, end date, team or owner ID.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function listPlaybookRuns(
        /** ID of the team to filter by. */
        string $team_id,
        /** Zero-based index of the page to request. */
        ?int $page = 0,
        /** Number of playbook runs to return per page. */
        ?int $per_page = 1000,
        /** Field to sort the returned playbook runs by. */
        ?string $sort = 'create_at',
        /** Direction (ascending or descending) followed by the sorting of the playbook runs. */
        ?string $direction = 'desc',
        /** The returned list will contain only the playbook runs with the specified statuses. */
        ?array $statuses = ['InProgress'],
        /** The returned list will contain only the playbook runs commanded by this user. Specify "me" for current user. */
        ?string $owner_user_id = null,
        /** The returned list will contain only the playbook runs for which the given user is a participant. Specify "me" for current user. */
        ?string $participant_id = null,
        /** The returned list will contain only the playbook runs whose name contains the search term. */
        ?string $search_term = null,
        /** The returned list will contain only the playbook runs associated with this channel ID. */
        ?string $channel_id = null,
        /** When set to true, only active runs (with EndAt = 0) are returned. When false or omitted, both active and ended runs are returned. */
        ?bool $omit_ended = false,
        /** Return only PlaybookRuns created/modified since the given timestamp (in milliseconds). */
        ?int $since = null,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookRunList|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['sort'] = $sort;
        $queryParameters['direction'] = $direction;
        $queryParameters['statuses'] = $statuses;
        $queryParameters['owner_user_id'] = $owner_user_id;
        $queryParameters['participant_id'] = $participant_id;
        $queryParameters['search_term'] = $search_term;
        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['omit_ended'] = $omit_ended;
        $queryParameters['since'] = $since;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PlaybookRunList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a new playbook run
     * Create a new playbook run in a team, using a playbook as template, with a specific name and a specific owner.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPlaybookRunFromPost(
        \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRunFromPostRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookRun|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\PlaybookRun::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get all owners
     * Get the owners of all playbook runs, filtered by team.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\OwnerInfo[]
     */
    public function getOwners(
        /** ID of the team to filter by. */
        string $team_id,
    ): array|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/owners', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OwnerInfo::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get playbook run channels
     * Get all channels associated with a playbook run, filtered by team, status, owner, name and/or members, and sorted by ID, name, status, creation date, end date, team, or owner ID.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannels(
        /** ID of the team to filter by. */
        string $team_id,
        /** Field to sort the returned channels by, according to their playbook run. */
        ?string $sort = 'create_at',
        /** Direction (ascending or descending) followed by the sorting of the playbook runs associated to the channels. */
        ?string $direction = 'desc',
        /** The returned list will contain only the channels whose playbook run has this status. */
        ?string $status = 'all',
        /** The returned list will contain only the channels whose playbook run is commanded by this user. */
        ?string $owner_user_id = null,
        /** The returned list will contain only the channels associated to a playbook run whose name contains the search term. */
        ?string $search_term = null,
        /** The returned list will contain only the channels associated to a playbook run for which the given user is a participant. */
        ?string $participant_id = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;
        $queryParameters['sort'] = $sort;
        $queryParameters['direction'] = $direction;
        $queryParameters['status'] = $status;
        $queryParameters['owner_user_id'] = $owner_user_id;
        $queryParameters['search_term'] = $search_term;
        $queryParameters['participant_id'] = $participant_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/channels', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = 'string[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Find playbook run by channel ID
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlaybookRunByChannelId(
        /** ID of the channel associated to the playbook run to retrieve. */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookRun|\CedricZiel\MattermostPhp\Client\Model\Default404Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/channel/{channel_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PlaybookRun::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\Default404Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlaybookRun(
        /** ID of the playbook run to retrieve. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookRun|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PlaybookRun::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updatePlaybookRun(
        /** ID of the playbook run to retrieve. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\UpdatePlaybookRunRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Get playbook run metadata
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlaybookRunMetadata(
        /** ID of the playbook run whose metadata will be retrieved. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookRunMetadata|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/metadata', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PlaybookRunMetadata::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * End a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function endPlaybookRun(
        /** ID of the playbook run to end. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/end', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Restart a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function restartPlaybookRun(
        /** ID of the playbook run to restart. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/restart', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Update a playbook run's status
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function status(
        /** ID of the playbook run to update. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\StatusRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/status', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Finish a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function finish(
        /** ID of the playbook run to finish. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/finish', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Update playbook run owner
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function changeOwner(
        /** ID of the playbook run whose owner will be changed. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\ChangeOwnerRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/owner', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Add an item to a playbook run's checklist
     * The most common pattern to add a new item is to only send its title as the request payload. By default, it is an open item, with no assignee and no slash command.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function addChecklistItem(
        /** ID of the playbook run whose checklist will be modified. */
        string $id,
        /** Zero-based index of the checklist to modify. */
        int $checklist,
        \CedricZiel\MattermostPhp\Client\Model\AddChecklistItemRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Error|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/add', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[0] = \CedricZiel\MattermostPhp\Client\Model\Error::class;
        $map[200] = null; // Void response

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Reorder an item in a playbook run's checklist
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function reoderChecklistItem(
        /** ID of the playbook run whose checklist will be modified. */
        string $id,
        /** Zero-based index of the checklist to modify. */
        int $checklist,
        \CedricZiel\MattermostPhp\Client\Model\ReoderChecklistItemRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/reorder', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Update an item of a playbook run's checklist
     * Update the title and the slash command of an item in one of the playbook run's checklists.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function itemRename(
        /** ID of the playbook run whose checklist will be modified. */
        string $id,
        /** Zero-based index of the checklist to modify. */
        int $checklist,
        /** Zero-based index of the item to modify. */
        int $item,
        \CedricZiel\MattermostPhp\Client\Model\ItemRenameRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;
        $pathParameters['item'] = $item;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/item/{item}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Delete an item of a playbook run's checklist
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function itemDelete(
        /** ID of the playbook run whose checklist will be modified. */
        string $id,
        /** Zero-based index of the checklist to modify. */
        int $checklist,
        /** Zero-based index of the item to modify. */
        int $item,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;
        $pathParameters['item'] = $item;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/item/{item}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[204] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Update the state of an item
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function itemSetState(
        /** ID of the playbook run whose checklist will be modified. */
        string $id,
        /** Zero-based index of the checklist to modify. */
        int $checklist,
        /** Zero-based index of the item to modify. */
        int $item,
        \CedricZiel\MattermostPhp\Client\Model\ItemSetStateRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;
        $pathParameters['item'] = $item;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/item/{item}/state', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Update the assignee of an item
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function itemSetAssignee(
        /** ID of the playbook run whose item will get a new assignee. */
        string $id,
        /** Zero-based index of the checklist whose item will get a new assignee. */
        int $checklist,
        /** Zero-based index of the item that will get a new assignee. */
        int $item,
        \CedricZiel\MattermostPhp\Client\Model\ItemSetAssigneeRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;
        $pathParameters['item'] = $item;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/item/{item}/assignee', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Run an item's slash command
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function itemRun(
        /** ID of the playbook run whose item will be executed. */
        string $id,
        /** Zero-based index of the checklist whose item will be executed. */
        int $checklist,
        /** Zero-based index of the item whose slash command will be executed. */
        int $item,
    ): \CedricZiel\MattermostPhp\Client\Model\TriggerIdReturn|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['checklist'] = $checklist;
        $pathParameters['item'] = $item;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/checklists/{checklist}/item/{item}/run', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\TriggerIdReturn::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get property fields for a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\PropertyField[]
     */
    public function getRunPropertyFields(
        /** ID of the playbook run to retrieve property fields from. */
        string $id,
        /** Filter results to only include property fields updated after this timestamp (Unix time in milliseconds). */
        ?int $updated_since = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $queryParameters['updated_since'] = $updated_since;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/property_fields', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get property values for a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\PropertyValue[]
     */
    public function getRunPropertyValues(
        /** ID of the playbook run to retrieve property values from. */
        string $id,
        /** Filter results to only include property values updated after this timestamp (Unix time in milliseconds). */
        ?int $updated_since = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $queryParameters['updated_since'] = $updated_since;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/property_values', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyValue::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Set a property value for a playbook run
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setRunPropertyValue(
        /** ID of the playbook run to set property value for. */
        string $id,
        /** ID of the property field to set value for. */
        string $field_id,
        \CedricZiel\MattermostPhp\Client\Model\SetRunPropertyValueRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PropertyValue|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['field_id'] = $field_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/property_fields/{field_id}/value', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyValue::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }
}
