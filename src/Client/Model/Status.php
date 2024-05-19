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
    ): Status {
        $object = new self(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            status: isset($data['status']) ? $data['status'] : null,
            manual: isset($data['manual']) ? $data['manual'] : null,
            last_activity_at: isset($data['last_activity_at']) ? $data['last_activity_at'] : null,
        );
        return $object;
    }
}
