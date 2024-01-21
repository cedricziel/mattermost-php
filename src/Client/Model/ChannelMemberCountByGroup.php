<?php

namespace CedricZiel\MattermostPhp\Client;

/**
 * An object describing group member information in a channel
 */
class ChannelMemberCountByGroup
{
    /** ID of the group */
    public ?string $group_id;

    /** Total number of group members in the channel */
    public ?\number $channel_member_count;

    /** Total number of unique timezones for the group members in the channel */
    public ?\number $channel_member_timezones_count;
}
;