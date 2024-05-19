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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            reply_count: isset($data['reply_count']) ? $data['reply_count'] : null,
            last_reply_at: isset($data['last_reply_at']) ? $data['last_reply_at'] : null,
            last_viewed_at: isset($data['last_viewed_at']) ? $data['last_viewed_at'] : null,
            participants: isset($data['participants']) ? $data['participants'] : null,
            post: isset($data['post']) ? $data['post'] : null,
        );
        return $object;
    }
}
