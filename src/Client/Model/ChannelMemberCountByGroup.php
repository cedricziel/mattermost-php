<?php

namespace CedricZiel\MattermostPhp\Client\Model;

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

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->group_id = $data['group_id'];
        $this->channel_member_count = $data['channel_member_count'];
        $this->channel_member_timezones_count = $data['channel_member_timezones_count'];
        return $this;
    }
}
