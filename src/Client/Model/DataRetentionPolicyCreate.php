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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DataRetentionPolicyCreate {
        $object = new self(
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            post_duration: isset($data['post_duration']) ? $data['post_duration'] : null,
            team_ids: isset($data['team_ids']) ? $data['team_ids'] : null,
            channel_ids: isset($data['channel_ids']) ? $data['channel_ids'] : null,
        );
        return $object;
    }
}
