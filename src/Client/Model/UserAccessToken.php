<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAccessToken
{
    public function __construct(
        /** Unique identifier for the token */
        public ?string $id = null,
        /** The token used for authentication */
        public ?string $token = null,
        /** The user the token authenticates for */
        public ?string $user_id = null,
        /** A description of the token usage */
        public ?string $description = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            token: $data['token'] ?? null,
            user_id: $data['user_id'] ?? null,
            description: $data['description'] ?? null,
        );
        return $object;
    }
}
