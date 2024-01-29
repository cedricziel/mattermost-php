<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAuthData
{
    public function __construct(
        /** Service-specific authentication data */
        public ?string $auth_data = null,
        /** The authentication service such as "email", "gitlab", or "ldap" */
        public ?string $auth_service = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['auth_data'] */
            if (isset($data['auth_data'])) $this->auth_data = $data['auth_data'];
        /** @var string $data['auth_service'] */
            if (isset($data['auth_service'])) $this->auth_service = $data['auth_service'];
        return $this;
    }
}
