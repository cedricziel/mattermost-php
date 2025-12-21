<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetPostsForReportingRequest
{
    public function __construct(
        /** The ID of the channel to retrieve posts from */
        public string $channel_id,
        /**
         * Opaque cursor string for pagination. Omit or use empty string for the first request. For subsequent requests, use the exact cursor value from the previous response's next_cursor. The cursor is base64-encoded and contains all pagination state including time, post ID, and query parameters. Do not attempt to parse or modify the cursor value.
         */
        public ?string $cursor = '',
        /**
         * Optional start time for query range in Unix milliseconds. Only used for the first request (ignored when cursor is provided). - For "asc" (ascending): starts retrieving from this time going forward - For "desc" (descending): starts retrieving from this time going backward If omitted, defaults to 0 for ascending or MaxInt64 for descending.
         */
        public ?int $start_time = null,
        /**
         * Which timestamp field to use for sorting and filtering. Use "create_at" to retrieve posts by creation time, or "update_at" to retrieve posts by last modification time.
         */
        public ?string $time_field = 'create_at',
        /**
         * Sort direction for pagination. Use "asc" to retrieve posts from oldest to newest, or "desc" to retrieve from newest to oldest.
         */
        public ?string $sort_direction = 'asc',
        /** Number of posts to return per page. Maximum 1000. */
        public ?int $per_page = 100,
        /**
         * If true, include posts that have been deleted (DeleteAt > 0). By default, only non-deleted posts are returned.
         */
        public ?bool $include_deleted = false,
        /**
         * If true, exclude all system posts.
         */
        public ?bool $exclude_system_posts = false,
        /**
         * If true, enrich posts with additional metadata including file information, reactions, custom emojis, priority, and acknowledgements. Note that this may increase response time for large result sets.
         */
        public ?bool $include_metadata = false,
    ) {
    }
}
