<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyWithTeamAndChannelIds extends DataRetentionPolicyWithoutId
{
    public function __construct(
        ?string $display_name = null,
        ?int $post_duration = null,
        /** The IDs of the teams to which this policy should be applied. */
        public ?array $team_ids = null,
        /** The IDs of the channels to which this policy should be applied. */
        public ?array $channel_ids = null,
    ) {
        parent::__construct(display_name: $display_name, post_duration: $post_duration);
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicyWithTeamAndChannelIds The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicyWithTeamAndChannelIds
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
