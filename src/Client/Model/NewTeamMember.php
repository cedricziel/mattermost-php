<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NewTeamMember
{
    /** The user's ID. */
    public ?string $id;
    public ?string $username;
    public ?string $first_name;
    public ?string $last_name;
    public ?string $nickname;

    /** The user's position field value. */
    public ?string $position;

    /** The creation timestamp of the team member record. */
    public ?int $create_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->nickname = $data['nickname'];
        $this->position = $data['position'];
        $this->create_at = $data['create_at'];
        return $this;
    }
}
