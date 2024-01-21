<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelMember
{
    public ?string $channel_id;
    public ?string $user_id;
    public ?string $roles;

    /** The time in milliseconds the channel was last viewed by the user */
    public ?int $last_viewed_at;
    public ?int $msg_count;
    public ?int $mention_count;
    public $notify_props;

    /** The time in milliseconds the channel member was last updated */
    public ?int $last_update_at;
}
;