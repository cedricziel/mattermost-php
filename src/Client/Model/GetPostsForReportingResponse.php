<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetPostsForReportingResponse
{
    public function __construct(
        /** Map of post IDs to post objects */
        public ?\stdClass $posts = null,
        /**
         * Opaque cursor for retrieving the next page. If null, there are no more pages. Pass the cursor string from this object in the next request.
         */
        public ?\stdClass $next_cursor = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetPostsForReportingResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetPostsForReportingResponse
    {
        $data ??= [];

        return new self(
            posts: isset($data['posts']) ? (object) $data['posts'] : null,
            next_cursor: isset($data['next_cursor']) ? (object) $data['next_cursor'] : null,
        );
    }
}
