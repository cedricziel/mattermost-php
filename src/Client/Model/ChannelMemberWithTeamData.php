<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelMemberWithTeamData extends ChannelMember
{
    public function __construct(
        ?string $channel_id = null,
        ?string $user_id = null,
        ?string $roles = null,
        ?int $last_viewed_at = null,
        ?int $msg_count = null,
        ?int $mention_count = null,
        $notify_props = null,
        ?int $last_update_at = null,
        /** The display name of the team to which this channel belongs. */
        public ?string $team_display_name = null,
        /** The name of the team to which this channel belongs. */
        public ?string $team_name = null,
        /** The time at which the team to which this channel belongs was last updated. */
        public ?int $team_update_at = null,
    ) {
        parent::__construct(channel_id: $channel_id, user_id: $user_id, roles: $roles, last_viewed_at: $last_viewed_at, msg_count: $msg_count, mention_count: $mention_count, notify_props: $notify_props, last_update_at: $last_update_at);
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelMemberWithTeamData The hydrated instance
     */
    public static function hydrate(?array $data): ChannelMemberWithTeamData
    {
        $data ??= [];

        return new self(
            channel_id: $data['channel_id'] ?? null,
            user_id: $data['user_id'] ?? null,
            roles: $data['roles'] ?? null,
            last_viewed_at: $data['last_viewed_at'] ?? null,
            msg_count: $data['msg_count'] ?? null,
            mention_count: $data['mention_count'] ?? null,
            notify_props: $data['notify_props'] ?? null,
            last_update_at: $data['last_update_at'] ?? null,
            team_display_name: $data['team_display_name'] ?? null,
            team_name: $data['team_name'] ?? null,
            team_update_at: $data['team_update_at'] ?? null,
        );
    }
}
