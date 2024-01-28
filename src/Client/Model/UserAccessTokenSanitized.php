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
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->description = $data['description'];
        $this->is_active = $data['is_active'];
        return $this;
    }
}
