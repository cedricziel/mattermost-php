<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OutgoingOAuthConnectionGetItem
{
    /** The unique identifier for the outgoing OAuth connection. */
    public ?string $id;

    /** The name of the outgoing OAuth connection. */
    public ?string $name;

    /** The time in milliseconds the outgoing OAuth connection was created. */
    public ?int $create_at;

    /** The time in milliseconds the outgoing OAuth connection was last updated. */
    public ?int $update_at;

    /** The grant type of the outgoing OAuth connection. */
    public ?string $grant_type;

    /** The audiences of the outgoing OAuth connection. */
    public ?string $audiences;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
        if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var string $data['grant_type'] */
        if (isset($data['grant_type'])) $this->grant_type = $data['grant_type'];
        /** @var string $data['audiences'] */
        if (isset($data['audiences'])) $this->audiences = $data['audiences'];
        return $this;
    }
}
