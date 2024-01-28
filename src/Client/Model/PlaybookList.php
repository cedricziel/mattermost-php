<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookList
{
    /** The total number of playbooks in the list, regardless of the paging. */
    public ?int $total_count;

    /** The total number of pages. This depends on the total number of playbooks in the database and the per_page parameter sent with the request. */
    public ?int $page_count;

    /** A boolean describing whether there are more pages after the currently returned. */
    public ?bool $has_more;

    /** The playbooks in this page. */
    public ?array $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['total_count'] */
        if (isset($data['total_count'])) $this->total_count = $data['total_count'];
        /** @var int $data['page_count'] */
        if (isset($data['page_count'])) $this->page_count = $data['page_count'];
        /** @var bool $data['has_more'] */
        if (isset($data['has_more'])) $this->has_more = $data['has_more'];
        /** @var array $data['items'] */
        if (isset($data['items'])) $this->items = $data['items'];
        return $this;
    }
}
