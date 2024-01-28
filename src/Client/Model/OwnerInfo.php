<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OwnerInfo
{
    /** A unique, 26 characters long, alphanumeric identifier for the owner. */
    public ?string $user_id;

    /** Owner's username. */
    public ?string $username;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->user_id = $data['user_id'];
        $this->username = $data['username'];
        return $this;
    }
}
