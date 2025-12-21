<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetLoginTypeResponse
{
    public function __construct(
        /** The authentication service type. Returns the actual service type if guest_magic_link is enabled (in which case a magic link is also sent to the user's email). Returns an empty string for all other authentication methods. */
        public ?string $auth_service = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetLoginTypeResponse {
        $object = new self(
            auth_service: isset($data['auth_service']) ? $data['auth_service'] : null,
        );
        return $object;
    }
}
