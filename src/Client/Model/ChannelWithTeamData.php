<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelWithTeamData extends Channel
{
    public function __construct(
        ?string $id = null,
        ?int $create_at = null,
        ?int $update_at = null,
        ?int $delete_at = null,
        ?string $team_id = null,
        ?string $type = null,
        ?string $display_name = null,
        ?string $name = null,
        ?string $header = null,
        ?string $purpose = null,
        ?int $last_post_at = null,
        ?int $total_msg_count = null,
        ?int $extra_update_at = null,
        ?string $creator_id = null,
        /** The display name of the team to which this channel belongs. */
        public ?string $team_display_name = null,
        /** The name of the team to which this channel belongs. */
        public ?string $team_name = null,
        /** The time at which the team to which this channel belongs was last updated. */
        public ?int $team_update_at = null,
        /** The data retention policy to which this team has been assigned. If no such policy exists, or the caller does not have the `sysconsole_read_compliance_data_retention` permission, this field will be null. */
        public ?string $policy_id = null,
    ) {
        parent::__construct(id: $id, create_at: $create_at, update_at: $update_at, delete_at: $delete_at, team_id: $team_id, type: $type, display_name: $display_name, name: $name, header: $header, purpose: $purpose, last_post_at: $last_post_at, total_msg_count: $total_msg_count, extra_update_at: $extra_update_at, creator_id: $creator_id);
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ChannelWithTeamData {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            header: isset($data['header']) ? $data['header'] : null,
            purpose: isset($data['purpose']) ? $data['purpose'] : null,
            last_post_at: isset($data['last_post_at']) ? $data['last_post_at'] : null,
            total_msg_count: isset($data['total_msg_count']) ? $data['total_msg_count'] : null,
            extra_update_at: isset($data['extra_update_at']) ? $data['extra_update_at'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            team_display_name: isset($data['team_display_name']) ? $data['team_display_name'] : null,
            team_name: isset($data['team_name']) ? $data['team_name'] : null,
            team_update_at: isset($data['team_update_at']) ? $data['team_update_at'] : null,
            policy_id: isset($data['policy_id']) ? $data['policy_id'] : null,
        );
        return $object;
    }
}
