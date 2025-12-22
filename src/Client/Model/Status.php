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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Status The hydrated instance
     */
    public static function hydrate(?array $data): Status
    {
        $data ??= [];

        return new self(
            user_id: $data['user_id'] ?? null,
            status: $data['status'] ?? null,
            manual: $data['manual'] ?? null,
            last_activity_at: $data['last_activity_at'] ?? null,
        );
    }
}
