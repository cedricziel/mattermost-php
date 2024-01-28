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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['username'] */
        if (isset($data['username'])) $this->username = $data['username'];
        /** @var string $data['first_name'] */
        if (isset($data['first_name'])) $this->first_name = $data['first_name'];
        /** @var string $data['last_name'] */
        if (isset($data['last_name'])) $this->last_name = $data['last_name'];
        /** @var string $data['nickname'] */
        if (isset($data['nickname'])) $this->nickname = $data['nickname'];
        /** @var string $data['position'] */
        if (isset($data['position'])) $this->position = $data['position'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        return $this;
    }
}
