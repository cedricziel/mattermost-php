<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Scheme
{
    /** The unique identifier of the scheme. */
    public ?string $id;

    /** The human readable name for the scheme. */
    public ?string $name;

    /** A human readable description of the scheme. */
    public ?string $description;

    /** The time at which the scheme was created. */
    public ?int $create_at;

    /** The time at which the scheme was last updated. */
    public ?int $update_at;

    /** The time at which the scheme was deleted. */
    public ?int $delete_at;

    /** The scope to which this scheme can be applied, either "team" or "channel". */
    public ?string $scope;

    /** The id of the default team admin role for this scheme. */
    public ?string $default_team_admin_role;

    /** The id of the default team user role for this scheme. */
    public ?string $default_team_user_role;

    /** The id of the default channel admin role for this scheme. */
    public ?string $default_channel_admin_role;

    /** The id of the default channel user role for this scheme. */
    public ?string $default_channel_user_role;

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
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
        if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['scope'] */
        if (isset($data['scope'])) $this->scope = $data['scope'];
        /** @var string $data['default_team_admin_role'] */
        if (isset($data['default_team_admin_role'])) $this->default_team_admin_role = $data['default_team_admin_role'];
        /** @var string $data['default_team_user_role'] */
        if (isset($data['default_team_user_role'])) $this->default_team_user_role = $data['default_team_user_role'];
        /** @var string $data['default_channel_admin_role'] */
        if (isset($data['default_channel_admin_role'])) $this->default_channel_admin_role = $data['default_channel_admin_role'];
        /** @var string $data['default_channel_user_role'] */
        if (isset($data['default_channel_user_role'])) $this->default_channel_user_role = $data['default_channel_user_role'];
        return $this;
    }
}
