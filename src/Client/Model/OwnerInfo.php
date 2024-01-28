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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['username'] */
        if (isset($data['username'])) $this->username = $data['username'];
        return $this;
    }
}
