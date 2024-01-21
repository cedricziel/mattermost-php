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
}
