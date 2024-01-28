<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAccessToken
{
    /** Unique identifier for the token */
    public ?string $id;

    /** The token used for authentication */
    public ?string $token;

    /** The user the token authenticates for */
    public ?string $user_id;

    /** A description of the token usage */
    public ?string $description;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->token = $data['token'];
        $this->user_id = $data['user_id'];
        $this->description = $data['description'];
        return $this;
    }
}
