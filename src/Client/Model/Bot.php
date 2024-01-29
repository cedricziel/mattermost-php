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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['user_id'] */
            if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['username'] */
            if (isset($data['username'])) $this->username = $data['username'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['owner_id'] */
            if (isset($data['owner_id'])) $this->owner_id = $data['owner_id'];
        return $this;
    }
}
