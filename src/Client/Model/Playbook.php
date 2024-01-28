<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Playbook
{
    /** A unique, 26 characters long, alphanumeric identifier for the playbook. */
    public ?string $id;

    /** The title of the playbook. */
    public ?string $title;

    /** The description of the playbook. */
    public ?string $description;

    /** The identifier of the team where the playbook is in. */
    public ?string $team_id;

    /** A boolean indicating whether the playbook runs created from this playbook should be public or private. */
    public ?bool $create_public_playbook_run;

    /** The playbook creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
    public ?int $create_at;

    /** The playbook deletion timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the playbook is not deleted. */
    public ?int $delete_at;

    /** The number of stages defined in this playbook. */
    public ?int $num_stages;

    /** The total number of steps from all the stages defined in this playbook. */
    public ?int $num_steps;

    /** The stages defined in this playbook. */
    public ?array $checklists;

    /** The identifiers of all the users that are members of this playbook. */
    public ?array $member_ids;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['title'] */
        if (isset($data['title'])) $this->title = $data['title'];
        /** @var string $data['description'] */
        if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['team_id'] */
        if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var bool $data['create_public_playbook_run'] */
        if (isset($data['create_public_playbook_run'])) $this->create_public_playbook_run = $data['create_public_playbook_run'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var int $data['num_stages'] */
        if (isset($data['num_stages'])) $this->num_stages = $data['num_stages'];
        /** @var int $data['num_steps'] */
        if (isset($data['num_steps'])) $this->num_steps = $data['num_steps'];
        /** @var array $data['checklists'] */
        if (isset($data['checklists'])) $this->checklists = $data['checklists'];
        /** @var array $data['member_ids'] */
        if (isset($data['member_ids'])) $this->member_ids = $data['member_ids'];
        return $this;
    }
}
