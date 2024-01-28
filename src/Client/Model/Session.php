<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Session
{
    /** The time in milliseconds a session was created */
    public ?int $create_at;
    public ?string $device_id;

    /** The time in milliseconds a session will expire */
    public ?int $expires_at;
    public ?string $id;
    public ?bool $is_oauth;

    /** The time in milliseconds of the last activity of a session */
    public ?int $last_activity_at;
    public ?\stdClass $props;
    public ?string $roles;
    public ?array $team_members;
    public ?string $token;
    public ?string $user_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['device_id'] */
        if (isset($data['device_id'])) $this->device_id = $data['device_id'];
        /** @var int $data['expires_at'] */
        if (isset($data['expires_at'])) $this->expires_at = $data['expires_at'];
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var bool $data['is_oauth'] */
        if (isset($data['is_oauth'])) $this->is_oauth = $data['is_oauth'];
        /** @var int $data['last_activity_at'] */
        if (isset($data['last_activity_at'])) $this->last_activity_at = $data['last_activity_at'];
        /** @var stdClass $data['props'] */
        if (isset($data['props'])) $this->props = (object) $data['props'];
        /** @var string $data['roles'] */
        if (isset($data['roles'])) $this->roles = $data['roles'];
        /** @var array $data['team_members'] */
        if (isset($data['team_members'])) $this->team_members = $data['team_members'];
        /** @var string $data['token'] */
        if (isset($data['token'])) $this->token = $data['token'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        return $this;
    }
}
