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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelMemberCountByGroup The hydrated instance
     */
    public static function hydrate(?array $data): ChannelMemberCountByGroup
    {
        $data ??= [];

        return new self(
            group_id: $data['group_id'] ?? null,
            channel_member_count: $data['channel_member_count'] ?? null,
            channel_member_timezones_count: $data['channel_member_timezones_count'] ?? null,
        );
    }
}
