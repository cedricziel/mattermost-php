<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TermsOfService
{
    public function __construct(
        /** The unique identifier of the terms of service. */
        public ?string $id = null,
        /** The time at which the terms of service was created. */
        public ?int $create_at = null,
        /** The unique identifier of the user who created these terms of service. */
        public ?string $user_id = null,
        /** The text of terms of service. Supports Markdown. */
        public ?string $text = null,
    ) {
    }

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
