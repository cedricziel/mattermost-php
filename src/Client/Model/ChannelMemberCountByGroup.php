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
        public ?int $channel_member_count = null,
        /** Total number of unique timezones for the group members in the channel */
        public ?int $channel_member_timezones_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            group_id: isset($data['group_id']) ? $data['group_id'] : null,
            channel_member_count: isset($data['channel_member_count']) ? $data['channel_member_count'] : null,
            channel_member_timezones_count: isset($data['channel_member_timezones_count']) ? $data['channel_member_timezones_count'] : null,
        );
        return $object;
    }
}
