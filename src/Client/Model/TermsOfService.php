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
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->user_id = $data['user_id'];
        $this->text = $data['text'];
        return $this;
    }
}
