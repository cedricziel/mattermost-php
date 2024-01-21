<?php

namespace CedricZiel\MattermostPhp\Client;

class PostList
{
    public ?array $order;
    public ?\stdClass $posts;

    /** The ID of next post. Not omitted when empty or not relevant. */
    public ?string $next_post_id;

    /** The ID of previous post. Not omitted when empty or not relevant. */
    public ?string $prev_post_id;

    /** Whether there are more items after this page. */
    public ?bool $has_next;
}
;