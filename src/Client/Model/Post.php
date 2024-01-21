<?php

namespace CedricZiel\MattermostPhp\Client;

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
}
;