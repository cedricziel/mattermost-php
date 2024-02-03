<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Session
{
    public function __construct(
        /** The time in milliseconds a session was created */
        public ?int $create_at = null,
        public ?string $device_id = null,
        /** The time in milliseconds a session will expire */
        public ?int $expires_at = null,
        public ?string $id = null,
        public ?bool $is_oauth = null,
        /** The time in milliseconds of the last activity of a session */
        public ?int $last_activity_at = null,
        public ?\stdClass $props = null,
        public ?string $roles = null,
        public ?array $team_members = null,
        public ?string $token = null,
        public ?string $user_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            create_at: $data['create_at'] ?? null,
            device_id: $data['device_id'] ?? null,
            expires_at: $data['expires_at'] ?? null,
            id: $data['id'] ?? null,
            is_oauth: $data['is_oauth'] ?? null,
            last_activity_at: $data['last_activity_at'] ?? null,
            props: (object) $data['props'] ?? null,
            roles: $data['roles'] ?? null,
            team_members: $data['team_members'] ?? null,
            token: $data['token'] ?? null,
            user_id: $data['user_id'] ?? null,
        );
        return $object;
    }
}
