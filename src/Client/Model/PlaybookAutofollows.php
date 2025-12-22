<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookAutofollows
{
    public function __construct(
        /** The total number of users who marked this playbook to auto-follow runs. */
        public ?int $total_count = null,
        /** The user IDs of who marked this playbook to auto-follow. */
        public ?array $items = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PlaybookAutofollows The hydrated instance
     */
    public static function hydrate(?array $data): PlaybookAutofollows
    {
        $data ??= [];

        return new self(
            total_count: $data['total_count'] ?? null,
            items: $data['items'] ?? null,
        );
    }
}
