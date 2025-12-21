<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PlaybooksEndpoint
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
     * List all playbooks
     * Retrieve a paged list of playbooks, filtered by team, and sorted by title, number of stages or number of steps.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlaybooks(
        /** ID of the team to filter by. */
        string $team_id,
        /** Zero-based index of the page to request. */
        ?int $page = 0,
        /** Number of playbooks to return per page. */
        ?int $per_page = 1000,
        /** Field to sort the returned playbooks by title, number of stages or total number of steps. */
        ?string $sort = 'title',
        /** Direction (ascending or descending) followed by the sorting of the playbooks. */
        ?string $direction = 'asc',
        /** Includes archived playbooks in the result. */
        ?bool $with_archived = false,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookList|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['sort'] = $sort;
        $queryParameters['direction'] = $direction;
        $queryParameters['with_archived'] = $with_archived;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PlaybookList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPlaybook(
        \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookResponse|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlaybook(
        /** ID of the playbook to retrieve. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\Playbook|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Playbook::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updatePlaybook(
        /** ID of the playbook to update. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\UpdatePlaybookRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
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
     * Delete a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deletePlaybook(
        /** ID of the playbook to delete. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[204] = null; // Void response
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Get property fields for a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\PropertyField[]
     */
    public function getPlaybookPropertyFields(
        /** ID of the playbook to retrieve property fields from. */
        string $id,
        /** Filter results to only include property fields updated after this timestamp (Unix time in milliseconds). */
        ?int $updated_since = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $queryParameters['updated_since'] = $updated_since;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/property_fields', $pathParameters, $queryParameters);

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
     * Create a property field for a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPlaybookPropertyField(
        /** ID of the playbook to create a property field for. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookPropertyFieldRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PropertyField|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/property_fields', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a property field for a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updatePlaybookPropertyField(
        /** ID of the playbook containing the property field. */
        string $id,
        /** ID of the property field to update. */
        string $field_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdatePlaybookPropertyFieldRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PropertyField|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['field_id'] = $field_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/property_fields/{field_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a property field for a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deletePlaybookPropertyField(
        /** ID of the playbook containing the property field. */
        string $id,
        /** ID of the property field to delete. */
        string $field_id,
    ): \CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['field_id'] = $field_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/property_fields/{field_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[204] = null; // Void response
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Reorder property fields for a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\PropertyField[]
     */
    public function reorderPlaybookPropertyFields(
        /** ID of the playbook. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\ReorderPlaybookPropertyFieldsRequest $requestBody,
    ): array|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default404Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/property_fields/reorder', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\Default404Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }
}
