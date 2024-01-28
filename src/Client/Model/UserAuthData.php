<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAuthData
{
    /** Service-specific authentication data */
    public ?string $auth_data;

    /** The authentication service such as "email", "gitlab", or "ldap" */
    public ?string $auth_service;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->auth_data = $data['auth_data'];
        $this->auth_service = $data['auth_service'];
        return $this;
    }
}
