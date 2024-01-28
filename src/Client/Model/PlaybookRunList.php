<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRunList
{
    /** The total number of playbook runs in the list, regardless of the paging. */
    public ?int $total_count;

    /** The total number of pages. This depends on the total number of playbook runs in the database and the per_page parameter sent with the request. */
    public ?int $page_count;

    /** A boolean describing whether there are more pages after the currently returned. */
    public ?bool $has_more;

    /** The playbook runs in this page. */
    public ?array $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->total_count = $data['total_count'];
        $this->page_count = $data['page_count'];
        $this->has_more = $data['has_more'];
        $this->items = $data['items'];
        return $this;
    }
}
