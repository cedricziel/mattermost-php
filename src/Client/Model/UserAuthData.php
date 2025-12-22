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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserAuthData The hydrated instance
     */
    public static function hydrate(?array $data): UserAuthData
    {
        $data ??= [];

        return new self(
            auth_data: $data['auth_data'] ?? null,
            auth_service: $data['auth_service'] ?? null,
        );
    }
}
