<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TermsOfService
{
    /** The unique identifier of the terms of service. */
    public ?string $id;

    /** The time at which the terms of service was created. */
    public ?int $create_at;

    /** The unique identifier of the user who created these terms of service. */
    public ?string $user_id;

    /** The text of terms of service. Supports Markdown. */
    public ?string $text;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['text'] */
        if (isset($data['text'])) $this->text = $data['text'];
        return $this;
    }
}
