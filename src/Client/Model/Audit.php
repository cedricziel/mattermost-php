<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Audit
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a audit was created */
        public ?int $create_at = null,
        public ?string $user_id = null,
        public ?string $action = null,
        public ?string $extra_info = null,
        public ?string $ip_address = null,
        public ?string $session_id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Audit The hydrated instance
     */
    public static function hydrate(?array $data): Audit
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            user_id: $data['user_id'] ?? null,
            action: $data['action'] ?? null,
            extra_info: $data['extra_info'] ?? null,
            ip_address: $data['ip_address'] ?? null,
            session_id: $data['session_id'] ?? null,
        );
    }
}
