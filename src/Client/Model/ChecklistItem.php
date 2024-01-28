<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChecklistItem
{
    /** A unique, 26 characters long, alphanumeric identifier for the checklist item. */
    public ?string $id;

    /** The title of the checklist item. */
    public ?string $title;

    /** The state of the checklist item. An empty string means that the item is not done. */
    public ?string $state;

    /** The timestamp for the latest modification of the item's state, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the item was never modified. */
    public ?int $state_modified;

    /** The identifier of the user that has been assigned to complete this item. If the item has no assignee, this is an empty string. */
    public ?string $assignee_id;

    /** The timestamp for the latest modification of the item's assignee, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the item never got an assignee. */
    public ?int $assignee_modified;

    /** The slash command associated with this item. If the item has no slash command associated, this is an empty string */
    public ?string $command;

    /** The timestamp for the latest execution of the item's command, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the command was never executed. */
    public ?int $command_last_run;

    /** A detailed description of the checklist item, formatted with Markdown. */
    public ?string $description;

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
        /** @var string $data['state'] */
        if (isset($data['state'])) $this->state = $data['state'];
        /** @var int $data['state_modified'] */
        if (isset($data['state_modified'])) $this->state_modified = $data['state_modified'];
        /** @var string $data['assignee_id'] */
        if (isset($data['assignee_id'])) $this->assignee_id = $data['assignee_id'];
        /** @var int $data['assignee_modified'] */
        if (isset($data['assignee_modified'])) $this->assignee_modified = $data['assignee_modified'];
        /** @var string $data['command'] */
        if (isset($data['command'])) $this->command = $data['command'];
        /** @var int $data['command_last_run'] */
        if (isset($data['command_last_run'])) $this->command_last_run = $data['command_last_run'];
        /** @var string $data['description'] */
        if (isset($data['description'])) $this->description = $data['description'];
        return $this;
    }
}
