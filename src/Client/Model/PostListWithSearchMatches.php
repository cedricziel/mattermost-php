<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostListWithSearchMatches
{
    public ?array $order;
    public ?\stdClass $posts;

    /** A mapping of post IDs to a list of matched terms within the post. This field will only be populated on servers running version 5.1 or greater with Elasticsearch enabled. */
    public ?\stdClass $matches;
}
