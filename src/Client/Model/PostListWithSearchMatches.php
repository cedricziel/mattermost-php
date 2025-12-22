<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostListWithSearchMatches
{
    public function __construct(
        public ?array $order = null,
        public ?\stdClass $posts = null,
        /** A mapping of post IDs to a list of matched terms within the post. This field will only be populated on servers running version 5.1 or greater with Elasticsearch enabled. */
        public ?\stdClass $matches = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PostListWithSearchMatches The hydrated instance
     */
    public static function hydrate(?array $data): PostListWithSearchMatches
    {
        $data ??= [];

        return new self(
            order: $data['order'] ?? null,
            posts: isset($data['posts']) ? (object) $data['posts'] : null,
            matches: isset($data['matches']) ? (object) $data['matches'] : null,
        );
    }
}
