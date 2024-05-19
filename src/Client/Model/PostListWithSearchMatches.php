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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            order: isset($data['order']) ? $data['order'] : null,
            posts: isset($data['posts']) ? (object) $data['posts'] : null,
            matches: isset($data['matches']) ? (object) $data['matches'] : null,
        );
        return $object;
    }
}
