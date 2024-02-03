<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRun
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the playbook run. */
        public ?string $id = null,
        /** The name of the playbook run. */
        public ?string $name = null,
        /** The description of the playbook run. */
        public ?string $description = null,
        /** True if the playbook run is ongoing; false if the playbook run is ended. */
        public ?bool $is_active = null,
        /** The identifier of the user that is commanding the playbook run. */
        public ?string $owner_user_id = null,
        /** The identifier of the team where the playbook run's channel is in. */
        public ?string $team_id = null,
        /** The identifier of the playbook run's channel. */
        public ?string $channel_id = null,
        /** The playbook run creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $create_at = null,
        /** The playbook run finish timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the playbook run is not finished. */
        public ?int $end_at = null,
        /** The playbook run deletion timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the playbook run is not deleted. */
        public ?int $delete_at = null,
        /** Zero-based index of the currently active stage. */
        public ?int $active_stage = null,
        /** The title of the currently active stage. */
        public ?string $active_stage_title = null,
        /** If the playbook run was created from a post, this field contains the identifier of such post. If not, this field is empty. */
        public ?string $post_id = null,
        /** The identifier of the playbook with from which this playbook run was created. */
        public ?string $playbook_id = null,
        public ?array $checklists = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
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
        );
        return $object;
    }
}
