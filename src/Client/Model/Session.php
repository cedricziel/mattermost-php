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
        $this->create_at = $data['create_at'];
        $this->device_id = $data['device_id'];
        $this->expires_at = $data['expires_at'];
        $this->id = $data['id'];
        $this->is_oauth = $data['is_oauth'];
        $this->last_activity_at = $data['last_activity_at'];
        $this->props = $data['props'];
        $this->roles = $data['roles'];
        $this->team_members = $data['team_members'];
        $this->token = $data['token'];
        $this->user_id = $data['user_id'];
        return $this;
    }
}
