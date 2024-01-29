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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var int $data['edit_at'] */
            if (isset($data['edit_at'])) $this->edit_at = $data['edit_at'];
        /** @var string $data['user_id'] */
            if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['channel_id'] */
            if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var string $data['root_id'] */
            if (isset($data['root_id'])) $this->root_id = $data['root_id'];
        /** @var string $data['original_id'] */
            if (isset($data['original_id'])) $this->original_id = $data['original_id'];
        /** @var string $data['message'] */
            if (isset($data['message'])) $this->message = $data['message'];
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var stdClass $data['props'] */
            if (isset($data['props'])) $this->props = (object) $data['props'];
        /** @var string $data['hashtag'] */
            if (isset($data['hashtag'])) $this->hashtag = $data['hashtag'];
        /** @var array $data['file_ids'] */
            if (isset($data['file_ids'])) $this->file_ids = $data['file_ids'];
        /** @var string $data['pending_post_id'] */
            if (isset($data['pending_post_id'])) $this->pending_post_id = $data['pending_post_id'];
        /** @var  $data['metadata'] */
            if (isset($data['metadata'])) $this->metadata = $data['metadata'];
        return $this;
    }
}
