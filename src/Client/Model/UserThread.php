<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * a thread that user is following
 */
class UserThread
{
    /** ID of the post that is this thread's root */
    public ?string $id;

    /** number of replies in this thread */
    public ?int $reply_count;

    /** timestamp of the last post to this thread */
    public ?int $last_reply_at;

    /** timestamp of the last time the user viewed this thread */
    public ?int $last_viewed_at;

    /** list of users participating in this thread. only includes IDs unless 'extended' was set to 'true' */
    public ?array $participants;
    public $post;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->reply_count = $data['reply_count'];
        $this->last_reply_at = $data['last_reply_at'];
        $this->last_viewed_at = $data['last_viewed_at'];
        $this->participants = $data['participants'];
        $this->post = $data['post'];
        return $this;
    }
}
