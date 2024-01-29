<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * An object describing group member information in a channel
 */
class ChannelMemberCountByGroup
{
    public function __construct(
        /** ID of the group */
        public ?string $group_id = null,
        /** Total number of group members in the channel */
        public ?\number $channel_member_count = null,
        /** Total number of unique timezones for the group members in the channel */
        public ?\number $channel_member_timezones_count = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['group_id'] */
            if (isset($data['group_id'])) $this->group_id = $data['group_id'];
        /** @var number $data['channel_member_count'] */
            if (isset($data['channel_member_count'])) $this->channel_member_count = $data['channel_member_count'];
        /** @var number $data['channel_member_timezones_count'] */
            if (isset($data['channel_member_timezones_count'])) $this->channel_member_timezones_count = $data['channel_member_timezones_count'];
        return $this;
    }
}
