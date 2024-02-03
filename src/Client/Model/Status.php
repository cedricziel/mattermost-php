<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Status
{
    public function __construct(
        public ?string $user_id = null,
        public ?string $status = null,
        public ?bool $manual = null,
        public ?int $last_activity_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            user_id: $data['user_id'] ?? null,
            status: $data['status'] ?? null,
            manual: $data['manual'] ?? null,
            last_activity_at: $data['last_activity_at'] ?? null,
        );
        return $object;
    }
}
