<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class InternalEndpoint
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
     * Create a new playbook run from dialog
     * This is an internal endpoint to create a playbook run from the submission of an interactive dialog, filled by a user in the webapp. See [Interactive Dialogs](https://docs.mattermost.com/developer/interactive-dialogs.html) for more information.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPlaybookRunFromDialog(
        \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRunFromDialogRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PlaybookRun|\CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default403Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/dialog', $pathParameters, $queryParameters);

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
     * Get autocomplete data for /playbook check
     * This is an internal endpoint used by the autocomplete system to retrieve the data needed to show the list of items that the user can check.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChecklistAutocomplete(
        /** ID of the channel the user is in. */
        string $channel_ID,
    ): \CedricZiel\MattermostPhp\Client\Model\Default500Response {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['channel_ID'] = $channel_ID;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/checklist-autocomplete', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * End a playbook run from dialog
     * This is an internal endpoint to end a playbook run via a confirmation dialog, submitted by a user in the webapp.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function endPlaybookRunDialog(
        /** ID of the playbook run to end. */
        string $id,
    ): \CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/end', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }

    /**
     * Go to next stage from dialog
     * This is an internal endpoint to go to the next stage via a confirmation dialog, submitted by a user in the webapp.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function nextStageDialog(
        /** The PlaybookRun ID */
        string $id,
        \CedricZiel\MattermostPhp\Client\Model\NextStageDialogRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Default400Response|\CedricZiel\MattermostPhp\Client\Model\Default500Response|null {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['id'] = $id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/plugins/playbooks/api/v0/runs/{id}/next-stage-dialog', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = null; // Void response
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\Default400Response::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\Default500Response::class;

        return $this->mapResponseAllowingVoid($response, $map);
    }
}
