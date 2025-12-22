<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OwnerInfo
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the owner. */
        public ?string $user_id = null,
        /** Owner's username. */
        public ?string $username = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return OwnerInfo The hydrated instance
     */
    public static function hydrate(?array $data): OwnerInfo
    {
        $data ??= [];

        return new self(
            user_id: $data['user_id'] ?? null,
            username: $data['username'] ?? null,
        );
    }
}
