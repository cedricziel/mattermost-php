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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PostList The hydrated instance
     */
    public static function hydrate(?array $data): PostList
    {
        $data ??= [];

        return new self(
            order: $data['order'] ?? null,
            posts: isset($data['posts']) ? (object) $data['posts'] : null,
            next_post_id: $data['next_post_id'] ?? null,
            prev_post_id: $data['prev_post_id'] ?? null,
            has_next: $data['has_next'] ?? null,
        );
    }
}
