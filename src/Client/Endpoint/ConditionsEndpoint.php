<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ConditionsEndpoint
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
     * List playbook conditions
     * Retrieve a paged list of conditions for a playbook.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPlaybookConditions(
        /** ID of the playbook to retrieve conditions from. */
        string $id,
        /** Zero-based index of the page to request. */
        ?int $page = 0,
        /** Number of conditions to return per page. */
        ?int $per_page = 20,
    ): \CedricZiel\MattermostPhp\Client\Model\ConditionList|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/conditions', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ConditionList::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a playbook condition
     * Create a new condition for a playbook.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPlaybookCondition(
        /** ID of the playbook to create a condition for. */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookConditionRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Condition|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/conditions', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\Condition::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a playbook condition
     * Update an existing condition for a playbook.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updatePlaybookCondition(
        /** ID of the playbook. */
        string $id,
        /** ID of the condition to update. */
        string $conditionID,
        \CedricZiel\MattermostPhp\Client\Model\UpdatePlaybookConditionRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Condition|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default404Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['conditionID'] = $conditionID;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/conditions/{conditionID}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Condition::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\Default404Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a playbook condition
     * Delete a condition from a playbook. Run conditions cannot be deleted as they are read-only snapshots.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deletePlaybookCondition(
        /** ID of the playbook. */
        string $id,
        /** ID of the condition to delete. */
        string $conditionID,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default404Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $pathParameters['conditionID'] = $conditionID;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/conditions/{conditionID}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[204] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\Default404Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * List run conditions
     * Retrieve a paged list of conditions for a run. Run conditions are read-only snapshots copied from the playbook.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRunConditions(
        /** ID of the run to retrieve conditions from. */
        string $id,
        /** Zero-based index of the page to request. */
        ?int $page = 0,
        /** Number of conditions to return per page. */
        ?int $per_page = 20,
    ): \CedricZiel\MattermostPhp\Client\Model\ConditionList|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default404Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/conditions', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ConditionList::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\Default404Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }
}
