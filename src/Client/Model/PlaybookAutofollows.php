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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
            items: isset($data['items']) ? $data['items'] : null,
        );
        return $object;
    }
}
