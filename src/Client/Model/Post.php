<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Post
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a post was created */
        public ?int $create_at = null,
        /** The time in milliseconds a post was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a post was deleted */
        public ?int $delete_at = null,
        public ?int $edit_at = null,
        public ?string $user_id = null,
        public ?string $channel_id = null,
        public ?string $root_id = null,
        public ?string $original_id = null,
        public ?string $message = null,
        public ?string $type = null,
        public ?\stdClass $props = null,
        public ?string $hashtag = null,
        public ?array $file_ids = null,
        public ?string $pending_post_id = null,
        public $metadata = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): Post {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            edit_at: isset($data['edit_at']) ? $data['edit_at'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            root_id: isset($data['root_id']) ? $data['root_id'] : null,
            original_id: isset($data['original_id']) ? $data['original_id'] : null,
            message: isset($data['message']) ? $data['message'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            props: isset($data['props']) ? (object) $data['props'] : null,
            hashtag: isset($data['hashtag']) ? $data['hashtag'] : null,
            file_ids: isset($data['file_ids']) ? $data['file_ids'] : null,
            pending_post_id: isset($data['pending_post_id']) ? $data['pending_post_id'] : null,
            metadata: isset($data['metadata']) ? $data['metadata'] : null,
        );
        return $object;
    }
}
