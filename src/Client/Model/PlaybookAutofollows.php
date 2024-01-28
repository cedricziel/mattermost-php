<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookAutofollows
{
    /** The total number of users who marked this playbook to auto-follow runs. */
    public ?int $total_count;

    /** The user IDs of who marked this playbook to auto-follow. */
    public ?array $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->total_count = $data['total_count'];
        $this->items = $data['items'];
        return $this;
    }
}
