<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnread
{
    public ?string $team_id;
    public ?string $channel_id;
    public ?int $msg_count;
    public ?int $mention_count;
}
