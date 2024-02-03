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
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            edit_at: $data['edit_at'] ?? null,
            user_id: $data['user_id'] ?? null,
            channel_id: $data['channel_id'] ?? null,
            root_id: $data['root_id'] ?? null,
            original_id: $data['original_id'] ?? null,
            message: $data['message'] ?? null,
            type: $data['type'] ?? null,
            props: (object) $data['props'] ?? null,
            hashtag: $data['hashtag'] ?? null,
            file_ids: $data['file_ids'] ?? null,
            pending_post_id: $data['pending_post_id'] ?? null,
            metadata: $data['metadata'] ?? null,
        );
        return $object;
    }
}
