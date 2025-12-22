<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyWithTeamAndChannelCounts extends DataRetentionPolicy
{
    public function __construct(
        ?string $display_name = null,
        ?int $post_duration = null,
        ?string $id = null,
        /** The number of teams to which this policy is applied. */
        public ?int $team_count = null,
        /** The number of channels to which this policy is applied. */
        public ?int $channel_count = null,
    ) {
        parent::__construct(display_name: $display_name, post_duration: $post_duration, id: $id);
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicyWithTeamAndChannelCounts The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicyWithTeamAndChannelCounts
    {
        $data ??= [];

        return new self(
            display_name: $data['display_name'] ?? null,
            post_duration: $data['post_duration'] ?? null,
            id: $data['id'] ?? null,
            team_count: $data['team_count'] ?? null,
            channel_count: $data['channel_count'] ?? null,
        );
    }
}
