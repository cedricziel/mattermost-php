<?php

namespace CedricZiel\MattermostPhp\Client;

class Integration_actionsEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Open a dialog
     */
    public function openInteractiveDialog(): array
    {
        $path = '/api/v4/actions/dialogs/open';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Submit a dialog
     */
    public function submitInteractiveDialog(): array
    {
        $path = '/api/v4/actions/dialogs/submit';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;