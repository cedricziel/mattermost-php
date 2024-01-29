<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * a thread that user is following
 */
class UserThread
{
    public function __construct(
        /** ID of the post that is this thread's root */
        public ?string $id = null,
        /** number of replies in this thread */
        public ?int $reply_count = null,
        /** timestamp of the last post to this thread */
        public ?int $last_reply_at = null,
        /** timestamp of the last time the user viewed this thread */
        public ?int $last_viewed_at = null,
        /** list of users participating in this thread. only includes IDs unless 'extended' was set to 'true' */
        public ?array $participants = null,
        public $post = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['reply_count'] */
            if (isset($data['reply_count'])) $this->reply_count = $data['reply_count'];
        /** @var int $data['last_reply_at'] */
            if (isset($data['last_reply_at'])) $this->last_reply_at = $data['last_reply_at'];
        /** @var int $data['last_viewed_at'] */
            if (isset($data['last_viewed_at'])) $this->last_viewed_at = $data['last_viewed_at'];
        /** @var array $data['participants'] */
            if (isset($data['participants'])) $this->participants = $data['participants'];
        /** @var  $data['post'] */
            if (isset($data['post'])) $this->post = $data['post'];
        return $this;
    }
}
