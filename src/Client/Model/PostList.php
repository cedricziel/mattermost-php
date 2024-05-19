<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostList
{
    public function __construct(
        public ?array $order = null,
        public ?\stdClass $posts = null,
        /** The ID of next post. Not omitted when empty or not relevant. */
        public ?string $next_post_id = null,
        /** The ID of previous post. Not omitted when empty or not relevant. */
        public ?string $prev_post_id = null,
        /** Whether there are more items after this page. */
        public ?bool $has_next = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PostList {
        $object = new self(
            order: isset($data['order']) ? $data['order'] : null,
            posts: isset($data['posts']) ? (object) $data['posts'] : null,
            next_post_id: isset($data['next_post_id']) ? $data['next_post_id'] : null,
            prev_post_id: isset($data['prev_post_id']) ? $data['prev_post_id'] : null,
            has_next: isset($data['has_next']) ? $data['has_next'] : null,
        );
        return $object;
    }
}
