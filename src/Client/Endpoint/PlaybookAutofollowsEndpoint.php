<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PlaybookAutofollowsEndpoint
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
     * Get the list of followers' user IDs of a playbook
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAutoFollows(
        /** ID of the playbook to retrieve followers from. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookAutofollows|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/playbooks/{id}/autofollows', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PlaybookAutofollows::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\Default403Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }
}
