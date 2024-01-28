<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAccessTokenSanitized
{
    /** Unique identifier for the token */
    public ?string $id;

    /** The user the token authenticates for */
    public ?string $user_id;

    /** A description of the token usage */
    public ?string $description;

    /** Indicates whether the token is active */
    public ?bool $is_active;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['description'] */
        if (isset($data['description'])) $this->description = $data['description'];
        /** @var bool $data['is_active'] */
        if (isset($data['is_active'])) $this->is_active = $data['is_active'];
        return $this;
    }
}
