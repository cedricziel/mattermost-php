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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['token'] */
        if (isset($data['token'])) $this->token = $data['token'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['description'] */
        if (isset($data['description'])) $this->description = $data['description'];
        return $this;
    }
}
