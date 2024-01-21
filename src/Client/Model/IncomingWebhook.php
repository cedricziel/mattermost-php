<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IncomingWebhook
{
    /** The unique identifier for this incoming webhook */
    public ?string $id;

    /** The time in milliseconds a incoming webhook was created */
    public ?int $create_at;

    /** The time in milliseconds a incoming webhook was last updated */
    public ?int $update_at;

    /** The time in milliseconds a incoming webhook was deleted */
    public ?int $delete_at;

    /** The ID of a public channel or private group that receives the webhook payloads */
    public ?string $channel_id;

    /** The description for this incoming webhook */
    public ?string $description;

    /** The display name for this incoming webhook */
    public ?string $display_name;
}
