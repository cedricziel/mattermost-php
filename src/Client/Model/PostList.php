<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostList
{
    public ?array $order;
    public ?\stdClass $posts;

    /** The ID of next post. Not omitted when empty or not relevant. */
    public ?string $next_post_id;

    /** The ID of previous post. Not omitted when empty or not relevant. */
    public ?string $prev_post_id;

    /** Whether there are more items after this page. */
    public ?bool $has_next;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->order = $data['order'];
        $this->posts = $data['posts'];
        $this->next_post_id = $data['next_post_id'];
        $this->prev_post_id = $data['prev_post_id'];
        $this->has_next = $data['has_next'];
        return $this;
    }
}
