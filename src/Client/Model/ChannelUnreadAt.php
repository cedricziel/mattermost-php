<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnreadAt
{
    /** The ID of the team the channel belongs to. */
    public ?string $team_id;

    /** The ID of the channel the user has access to.. */
    public ?string $channel_id;

    /** No. of messages the user has already read. */
    public ?int $msg_count;

    /** No. of mentions the user has within the unread posts of the channel. */
    public ?int $mention_count;

    /** time in milliseconds when the user last viewed the channel. */
    public ?int $last_viewed_at;
}
;