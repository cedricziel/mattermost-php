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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['total_count'] */
            if (isset($data['total_count'])) $this->total_count = $data['total_count'];
        /** @var array $data['items'] */
            if (isset($data['items'])) $this->items = $data['items'];
        return $this;
    }
}
