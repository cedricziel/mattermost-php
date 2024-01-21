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
}
;