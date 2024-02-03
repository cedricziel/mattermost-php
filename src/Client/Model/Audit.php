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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            user_id: $data['user_id'] ?? null,
            action: $data['action'] ?? null,
            extra_info: $data['extra_info'] ?? null,
            ip_address: $data['ip_address'] ?? null,
            session_id: $data['session_id'] ?? null,
        );
        return $object;
    }
}
