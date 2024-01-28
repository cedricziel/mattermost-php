<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NewTeamMembersList
{
    /** Indicates if there is another page of new team members that can be fetched. */
    public ?bool $has_next;

    /** List of new team members. */
    public ?array $items;

    /** The total count of new team members for the given time range. */
    public ?int $total_count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['has_next'] */
        if (isset($data['has_next'])) $this->has_next = $data['has_next'];
        /** @var array $data['items'] */
        if (isset($data['items'])) $this->items = $data['items'];
        /** @var int $data['total_count'] */
        if (isset($data['total_count'])) $this->total_count = $data['total_count'];
        return $this;
    }
}
