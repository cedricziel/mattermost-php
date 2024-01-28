<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A bot account
 */
class Bot
{
    /** The user id of the associated user entry. */
    public ?string $user_id;

    /** The time in milliseconds a bot was created */
    public ?int $create_at;

    /** The time in milliseconds a bot was last updated */
    public ?int $update_at;

    /** The time in milliseconds a bot was deleted */
    public ?int $delete_at;
    public ?string $username;
    public ?string $display_name;
    public ?string $description;

    /** The user id of the user that currently owns this bot. */
    public ?string $owner_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->user_id = $data['user_id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->username = $data['username'];
        $this->display_name = $data['display_name'];
        $this->description = $data['description'];
        $this->owner_id = $data['owner_id'];
        return $this;
    }
}
