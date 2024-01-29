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
        /** @var string $data['next_post_id'] */
            if (isset($data['next_post_id'])) $this->next_post_id = $data['next_post_id'];
        /** @var string $data['prev_post_id'] */
            if (isset($data['prev_post_id'])) $this->prev_post_id = $data['prev_post_id'];
        /** @var bool $data['has_next'] */
            if (isset($data['has_next'])) $this->has_next = $data['has_next'];
        return $this;
    }
}
