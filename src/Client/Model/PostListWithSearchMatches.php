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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['order'] */
            if (isset($data['order'])) $this->order = $data['order'];
        /** @var stdClass $data['posts'] */
            if (isset($data['posts'])) $this->posts = (object) $data['posts'];
        /** @var stdClass $data['matches'] */
            if (isset($data['matches'])) $this->matches = (object) $data['matches'];
        return $this;
    }
}
