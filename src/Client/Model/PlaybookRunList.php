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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PlaybookRunList The hydrated instance
     */
    public static function hydrate(?array $data): PlaybookRunList
    {
        $data ??= [];

        return new self(
            total_count: $data['total_count'] ?? null,
            page_count: $data['page_count'] ?? null,
            has_more: $data['has_more'] ?? null,
            items: $data['items'] ?? null,
        );
    }
}
