<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class Integration_actionsEndpoint
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
     * Open a dialog
     * Open an interactive dialog using a trigger ID provided by a slash command, or some other action payload. See https://docs.mattermost.com/developer/interactive-dialogs.html for more information on interactive dialogs.
     * __Minimum server version: 5.6__
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function openInteractiveDialog(
        \CedricZiel\MattermostPhp\Client\Model\OpenInteractiveDialogRequest $requestBody,
    ): array
    {
        $path = '/api/v4/actions/dialogs/open';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OpenInteractiveDialogResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Submit a dialog
     * Endpoint used by the Mattermost clients to submit a dialog. See https://docs.mattermost.com/developer/interactive-dialogs.html for more information on interactive dialogs.
     * __Minimum server version: 5.6__
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function submitInteractiveDialog(
        \CedricZiel\MattermostPhp\Client\Model\SubmitInteractiveDialogRequest $requestBody,
    ): array
    {
        $path = '/api/v4/actions/dialogs/submit';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SubmitInteractiveDialogResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }
}
