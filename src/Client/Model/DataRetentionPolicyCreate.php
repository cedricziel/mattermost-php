<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyCreate extends DataRetentionPolicyWithTeamAndChannelIds
{
    public function __construct(
        ?string $display_name = null,
        ?int $post_duration = null,
        ?array $team_ids = null,
        ?array $channel_ids = null,
    ) {
        parent::__construct(display_name: $display_name, post_duration: $post_duration, team_ids: $team_ids, channel_ids: $channel_ids);
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicyCreate The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicyCreate
    {
        $data ??= [];

        return new self(
            display_name: $data['display_name'] ?? null,
            post_duration: $data['post_duration'] ?? null,
            team_ids: $data['team_ids'] ?? null,
            channel_ids: $data['channel_ids'] ?? null,
        );
    }
}
