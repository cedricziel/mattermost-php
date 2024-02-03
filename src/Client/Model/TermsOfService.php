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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            user_id: $data['user_id'] ?? null,
            text: $data['text'] ?? null,
        );
        return $object;
    }
}
