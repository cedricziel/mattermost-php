<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Post
{
    public ?string $id;

    /** The time in milliseconds a post was created */
    public ?int $create_at;

    /** The time in milliseconds a post was last updated */
    public ?int $update_at;

    /** The time in milliseconds a post was deleted */
    public ?int $delete_at;
    public ?int $edit_at;
    public ?string $user_id;
    public ?string $channel_id;
    public ?string $root_id;
    public ?string $original_id;
    public ?string $message;
    public ?string $type;
    public ?\stdClass $props;
    public ?string $hashtag;
    public ?array $file_ids;
    public ?string $pending_post_id;
    public $metadata;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->edit_at = $data['edit_at'];
        $this->user_id = $data['user_id'];
        $this->channel_id = $data['channel_id'];
        $this->root_id = $data['root_id'];
        $this->original_id = $data['original_id'];
        $this->message = $data['message'];
        $this->type = $data['type'];
        $this->props = $data['props'];
        $this->hashtag = $data['hashtag'];
        $this->file_ids = $data['file_ids'];
        $this->pending_post_id = $data['pending_post_id'];
        $this->metadata = $data['metadata'];
        return $this;
    }
}
