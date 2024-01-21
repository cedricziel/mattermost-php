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
}