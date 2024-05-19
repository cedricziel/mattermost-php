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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            grant_type: isset($data['grant_type']) ? $data['grant_type'] : null,
            audiences: isset($data['audiences']) ? $data['audiences'] : null,
        );
        return $object;
    }
}
