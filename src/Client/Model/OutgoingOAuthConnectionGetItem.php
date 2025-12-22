<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OutgoingOAuthConnectionGetItem
{
    public function __construct(
        /** The unique identifier for the outgoing OAuth connection. */
        public ?string $id = null,
        /** The name of the outgoing OAuth connection. */
        public ?string $name = null,
        /** The time in milliseconds the outgoing OAuth connection was created. */
        public ?int $create_at = null,
        /** The time in milliseconds the outgoing OAuth connection was last updated. */
        public ?int $update_at = null,
        /** The grant type of the outgoing OAuth connection. */
        public ?string $grant_type = null,
        /** The audiences of the outgoing OAuth connection. */
        public ?string $audiences = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return OutgoingOAuthConnectionGetItem The hydrated instance
     */
    public static function hydrate(?array $data): OutgoingOAuthConnectionGetItem
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            grant_type: $data['grant_type'] ?? null,
            audiences: $data['audiences'] ?? null,
        );
    }
}
