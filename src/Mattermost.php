<?php

namespace CedricZiel\MattermostPhp;

use CedricZiel\MattermostPhp\API\UsersApi;
use Psr\Http\Message\ResponseInterface;

/**
 * @method UsersApi users()
 */
class Mattermost
{
    public function __construct(
        protected Client  $client,
        protected ?string $token = null,
        protected ?string $login_id = null,
        protected ?string $password = null,
    ) {
    }

    public function authenticate(): User
    {
        if ($this->token) {
            $this->client->setToken($this->token);

            return $this->users()->me();
        }

        if ($this->login_id && $this->password) {
            $loginResponse = $this->login($this->login_id, $this->password);
            if ($loginResponse->hasHeader('Token')) {
                $this->token = $loginResponse->getHeader('Token')[0];

                $this->client->setToken($this->token);

                return $this->users()->me();
            }
        }

        throw new \RuntimeException('No authentication method provided');
    }

    protected function login(string $login_id, string $password): ResponseInterface
    {
        $loginResponse = $this->client->post('/users/login', $login_id, $password);

        return $loginResponse;
    }

    public function __call(string $api, array $arguments)
    {
        switch ($api) {
            case 'users':
                return new User($this->client);
        }
    }
}
