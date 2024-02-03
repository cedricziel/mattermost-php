<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRunList
{
    public function __construct(
        /** The total number of playbook runs in the list, regardless of the paging. */
        public ?int $total_count = null,
        /** The total number of pages. This depends on the total number of playbook runs in the database and the per_page parameter sent with the request. */
        public ?int $page_count = null,
        /** A boolean describing whether there are more pages after the currently returned. */
        public ?bool $has_more = null,
        /** The playbook runs in this page. */
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
            page_count: isset($data['page_count']) ? $data['page_count'] : null,
            has_more: isset($data['has_more']) ? $data['has_more'] : null,
            items: isset($data['items']) ? $data['items'] : null,
        );
        return $object;
    }
}
