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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserAccessToken The hydrated instance
     */
    public static function hydrate(?array $data): UserAccessToken
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            token: $data['token'] ?? null,
            user_id: $data['user_id'] ?? null,
            description: $data['description'] ?? null,
        );
    }
}
