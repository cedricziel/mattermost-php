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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            auth_data: isset($data['auth_data']) ? $data['auth_data'] : null,
            auth_service: isset($data['auth_service']) ? $data['auth_service'] : null,
        );
        return $object;
    }
}
