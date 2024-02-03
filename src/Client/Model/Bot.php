<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A bot account
 */
class Bot
{
    public function __construct(
        /** The user id of the associated user entry. */
        public ?string $user_id = null,
        /** The time in milliseconds a bot was created */
        public ?int $create_at = null,
        /** The time in milliseconds a bot was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a bot was deleted */
        public ?int $delete_at = null,
        public ?string $username = null,
        public ?string $display_name = null,
        public ?string $description = null,
        /** The user id of the user that currently owns this bot. */
        public ?string $owner_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            owner_id: isset($data['owner_id']) ? $data['owner_id'] : null,
        );
        return $object;
    }
}
