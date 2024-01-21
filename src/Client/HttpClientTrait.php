<?php

namespace CedricZiel\MattermostPhp\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

trait HttpClientTrait
{
    protected ClientInterface $httpClient;

    protected RequestFactoryInterface $requestFactory;

    public function setHttpClient(ClientInterface $httpClient): static
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function setRequestFactory(RequestFactoryInterface $requestFactory): static
    {
        $this->requestFactory = $requestFactory;

        return $this;
    }
}
