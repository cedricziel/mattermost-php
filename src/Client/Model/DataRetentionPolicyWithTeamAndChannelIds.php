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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DataRetentionPolicyWithTeamAndChannelIds {
        $object = new self(
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            post_duration: isset($data['post_duration']) ? $data['post_duration'] : null,
            team_ids: isset($data['team_ids']) ? $data['team_ids'] : null,
            channel_ids: isset($data['channel_ids']) ? $data['channel_ids'] : null,
        );
        return $object;
    }
}
