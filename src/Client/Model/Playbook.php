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
}
;