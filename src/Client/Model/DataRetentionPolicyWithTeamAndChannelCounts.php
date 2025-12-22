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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DataRetentionPolicyWithTeamAndChannelCounts {
        $object = new self(
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            post_duration: isset($data['post_duration']) ? $data['post_duration'] : null,
            id: isset($data['id']) ? $data['id'] : null,
            team_count: isset($data['team_count']) ? $data['team_count'] : null,
            channel_count: isset($data['channel_count']) ? $data['channel_count'] : null,
        );
        return $object;
    }
}
