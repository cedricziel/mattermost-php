<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAccessTokenSanitized
{
    public function __construct(
        /** Unique identifier for the token */
        public ?string $id = null,
        /** The user the token authenticates for */
        public ?string $user_id = null,
        /** A description of the token usage */
        public ?string $description = null,
        /** Indicates whether the token is active */
        public ?bool $is_active = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserAccessTokenSanitized The hydrated instance
     */
    public static function hydrate(?array $data): UserAccessTokenSanitized
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            user_id: $data['user_id'] ?? null,
            description: $data['description'] ?? null,
            is_active: $data['is_active'] ?? null,
        );
    }
}
