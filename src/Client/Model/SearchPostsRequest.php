<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchPostsRequest
{
    public function __construct(
        /** The search terms as inputed by the user. To search for posts from a user include `from:someusername`, using a user's username. To search in a specific channel include `in:somechannel`, using the channel name (not the display name). */
        public string $terms,
        /** Set to true if an Or search should be performed vs an And search. */
        public bool $is_or_search,
        /** Offset from UTC of user timezone for date searches. */
        public ?int $time_zone_offset = null,
        /** Set to true if deleted channels should be included in the search. (archived channels) */
        public ?bool $include_deleted_channels = null,
        /** The page to select. (Only works with Elasticsearch) */
        public ?int $page = null,
        /** The number of posts per page. (Only works with Elasticsearch) */
        public ?int $per_page = null,
    ) {
    }
}
