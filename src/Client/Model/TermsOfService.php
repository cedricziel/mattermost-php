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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TermsOfService The hydrated instance
     */
    public static function hydrate(?array $data): TermsOfService
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            user_id: $data['user_id'] ?? null,
            text: $data['text'] ?? null,
        );
    }
}
