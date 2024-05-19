<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Playbook
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the playbook. */
        public ?string $id = null,
        /** The title of the playbook. */
        public ?string $title = null,
        /** The description of the playbook. */
        public ?string $description = null,
        /** The identifier of the team where the playbook is in. */
        public ?string $team_id = null,
        /** A boolean indicating whether the playbook runs created from this playbook should be public or private. */
        public ?bool $create_public_playbook_run = null,
        /** The playbook creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $create_at = null,
        /** The playbook deletion timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if the playbook is not deleted. */
        public ?int $delete_at = null,
        /** The number of stages defined in this playbook. */
        public ?int $num_stages = null,
        /** The total number of steps from all the stages defined in this playbook. */
        public ?int $num_steps = null,
        /** The stages defined in this playbook. */
        public ?array $checklists = null,
        /** The identifiers of all the users that are members of this playbook. */
        public ?array $member_ids = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            title: isset($data['title']) ? $data['title'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            create_public_playbook_run: isset($data['create_public_playbook_run']) ? $data['create_public_playbook_run'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            num_stages: isset($data['num_stages']) ? $data['num_stages'] : null,
            num_steps: isset($data['num_steps']) ? $data['num_steps'] : null,
            checklists: isset($data['checklists']) ? $data['checklists'] : null,
            member_ids: isset($data['member_ids']) ? $data['member_ids'] : null,
        );
        return $object;
    }
}
