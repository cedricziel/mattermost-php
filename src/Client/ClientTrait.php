<?php

namespace CedricZiel\MattermostPhp\Client;

use Psr\Http\Client\ClientExceptionInterface;

trait ClientTrait
{
    public function setToken(?string $token): static
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function authenticate(?string $login_id = null, ?string $password = null): Model\DefaultBadRequestResponse|Model\DefaultNotFoundResponse|Model\DefaultUnauthorizedResponse|Model\User
    {
        if ($this->token) {
            return $this->users()->getUser('me');
        }

        if ($login_id && $password) {
            $body = new \stdClass();
            $body->login_id = $login_id;
            $body->password = $password;

            $request = $this->requestFactory->createRequest('POST', $this->baseUrl . '/api/v4/users/login');
            $request = $request->withHeader('Content-Type', 'application/json');
            $request = $request->withBody($this->streamFactory->createStream(json_encode($body)));

            $response = $this->httpClient->sendRequest($request);
            if ($response->hasHeader('Token')) {
                $this->token = $response->getHeader('Token')[0];

                return $this->users()->getUser('me');
            }
        }

        throw new \RuntimeException('No authentication method provided');
    }
}
