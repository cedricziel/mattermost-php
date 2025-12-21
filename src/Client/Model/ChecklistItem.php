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
        /** The timestamp for the last time the item was skipped, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the item was never skipped. */
        public ?int $delete_at = null,
        /** The timestamp for the due date of the checklist item, formatted as the number of milliseconds since the Unix epoch. It equals 0 if not set. For playbooks, this is a relative timestamp; for runs, this is an absolute timestamp. */
        public ?int $due_date = null,
        /** An array of all the task actions associated with this task. */
        public ?array $task_actions = null,
        /** The timestamp for when this checklist item was last modified, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $update_at = null,
        /** The ID of the condition that created this checklist item, if any. Empty string if the item was not created by a condition. */
        public ?string $condition_id = null,
        /** A string that represents the action created as a result of a condition evaluation. Empty string means no action, 'hidden' means the item is hidden due to condition not being met, 'shown_because_modified' means the item is shown despite condition not being met because it was recently modified. */
        public ?string $condition_action = null,
        /** A string representation of the condition that affects this checklist item. Empty string if no condition is associated with this item. */
        public ?string $condition_reason = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ChecklistItem {
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
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            due_date: isset($data['due_date']) ? $data['due_date'] : null,
            task_actions: isset($data['task_actions']) ? $data['task_actions'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            condition_id: isset($data['condition_id']) ? $data['condition_id'] : null,
            condition_action: isset($data['condition_action']) ? $data['condition_action'] : null,
            condition_reason: isset($data['condition_reason']) ? $data['condition_reason'] : null,
        );
        return $object;
    }
}
