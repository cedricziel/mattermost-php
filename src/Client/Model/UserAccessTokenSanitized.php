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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            is_active: isset($data['is_active']) ? $data['is_active'] : null,
        );
        return $object;
    }
}
