<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChecklistItem
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the checklist item. */
        public ?string $id = null,
        /** The title of the checklist item. */
        public ?string $title = null,
        /** The state of the checklist item. An empty string means that the item is not done. */
        public ?string $state = null,
        /** The timestamp for the latest modification of the item's state, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the item was never modified. */
        public ?int $state_modified = null,
        /** The identifier of the user that has been assigned to complete this item. If the item has no assignee, this is an empty string. */
        public ?string $assignee_id = null,
        /** The timestamp for the latest modification of the item's assignee, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the item never got an assignee. */
        public ?int $assignee_modified = null,
        /** The slash command associated with this item. If the item has no slash command associated, this is an empty string */
        public ?string $command = null,
        /** The timestamp for the latest execution of the item's command, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the command was never executed. */
        public ?int $command_last_run = null,
        /** A detailed description of the checklist item, formatted with Markdown. */
        public ?string $description = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            title: isset($data['title']) ? $data['title'] : null,
            state: isset($data['state']) ? $data['state'] : null,
            state_modified: isset($data['state_modified']) ? $data['state_modified'] : null,
            assignee_id: isset($data['assignee_id']) ? $data['assignee_id'] : null,
            assignee_modified: isset($data['assignee_modified']) ? $data['assignee_modified'] : null,
            command: isset($data['command']) ? $data['command'] : null,
            command_last_run: isset($data['command_last_run']) ? $data['command_last_run'] : null,
            description: isset($data['description']) ? $data['description'] : null,
        );
        return $object;
    }
}
