<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class WebhookOnCreationPayload extends PlaybookRun
{
    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $description = null,
        ?bool $is_active = null,
        ?string $owner_user_id = null,
        ?string $team_id = null,
        ?string $channel_id = null,
        ?int $create_at = null,
        ?int $end_at = null,
        ?int $delete_at = null,
        ?int $active_stage = null,
        ?string $active_stage_title = null,
        ?string $post_id = null,
        ?string $playbook_id = null,
        ?array $checklists = null,
        /** Absolute URL to the playbook run's channel. */
        public ?string $channel_url = null,
        /** Absolute URL to the playbook run's details. */
        public ?string $details_url = null,
    ) {
        parent::__construct(id: $id, name: $name, description: $description, is_active: $is_active, owner_user_id: $owner_user_id, team_id: $team_id, channel_id: $channel_id, create_at: $create_at, end_at: $end_at, delete_at: $delete_at, active_stage: $active_stage, active_stage_title: $active_stage_title, post_id: $post_id, playbook_id: $playbook_id, checklists: $checklists);
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): WebhookOnCreationPayload {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            is_active: isset($data['is_active']) ? $data['is_active'] : null,
            owner_user_id: isset($data['owner_user_id']) ? $data['owner_user_id'] : null,
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            end_at: isset($data['end_at']) ? $data['end_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            active_stage: isset($data['active_stage']) ? $data['active_stage'] : null,
            active_stage_title: isset($data['active_stage_title']) ? $data['active_stage_title'] : null,
            post_id: isset($data['post_id']) ? $data['post_id'] : null,
            playbook_id: isset($data['playbook_id']) ? $data['playbook_id'] : null,
            checklists: isset($data['checklists']) ? $data['checklists'] : null,
            channel_url: isset($data['channel_url']) ? $data['channel_url'] : null,
            details_url: isset($data['details_url']) ? $data['details_url'] : null,
        );
        return $object;
    }
}
