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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetPostsForReportingResponse {
        $object = new self(
            posts: isset($data['posts']) ? $data['posts'] : null,
            next_cursor: isset($data['next_cursor']) ? $data['next_cursor'] : null,
        );
        return $object;
    }
}
