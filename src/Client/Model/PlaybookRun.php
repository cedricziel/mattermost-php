<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRun
{
    /** A unique, 26 characters long, alphanumeric identifier for the playbook run. */
    public ?string $id;

    /** The name of the playbook run. */
    public ?string $name;

    /** The description of the playbook run. */
    public ?string $description;

    /** True if the playbook run is ongoing; false if the playbook run is ended. */
    public ?bool $is_active;

    /** The identifier of the user that is commanding the playbook run. */
    public ?string $owner_user_id;

    /** The identifier of the team where the playbook run's channel is in. */
    public ?string $team_id;

    /** The identifier of the playbook run's channel. */
    public ?string $channel_id;

    /** The playbook run creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
    public ?int $create_at;

    /** The playbook run finish timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the playbook run is not finished. */
    public ?int $end_at;

    /** The playbook run deletion timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the playbook run is not deleted. */
    public ?int $delete_at;

    /** Zero-based index of the currently active stage. */
    public ?int $active_stage;

    /** The title of the currently active stage. */
    public ?string $active_stage_title;

    /** If the playbook run was created from a post, this field contains the identifier of such post. If not, this field is empty. */
    public ?string $post_id;

    /** The identifier of the playbook with from which this playbook run was created. */
    public ?string $playbook_id;
    public ?array $checklists;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['description'] */
        if (isset($data['description'])) $this->description = $data['description'];
        /** @var bool $data['is_active'] */
        if (isset($data['is_active'])) $this->is_active = $data['is_active'];
        /** @var string $data['owner_user_id'] */
        if (isset($data['owner_user_id'])) $this->owner_user_id = $data['owner_user_id'];
        /** @var string $data['team_id'] */
        if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['channel_id'] */
        if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['end_at'] */
        if (isset($data['end_at'])) $this->end_at = $data['end_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var int $data['active_stage'] */
        if (isset($data['active_stage'])) $this->active_stage = $data['active_stage'];
        /** @var string $data['active_stage_title'] */
        if (isset($data['active_stage_title'])) $this->active_stage_title = $data['active_stage_title'];
        /** @var string $data['post_id'] */
        if (isset($data['post_id'])) $this->post_id = $data['post_id'];
        /** @var string $data['playbook_id'] */
        if (isset($data['playbook_id'])) $this->playbook_id = $data['playbook_id'];
        /** @var array $data['checklists'] */
        if (isset($data['checklists'])) $this->checklists = $data['checklists'];
        return $this;
    }
}
