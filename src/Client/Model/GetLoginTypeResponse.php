<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetLoginTypeResponse
{
    public function __construct(
        /** The authentication service type. Returns the actual service type if guest_magic_link is enabled (in which case a magic link is also sent to the user's email). Returns an empty string for all other authentication methods. */
        public ?string $auth_service = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetLoginTypeResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetLoginTypeResponse
    {
        $data ??= [];

        return new self(
            auth_service: $data['auth_service'] ?? null,
        );
    }
}
