<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Compliance
{
    public function __construct(
        public ?string $id = null,
        public ?int $create_at = null,
        public ?string $user_id = null,
        public ?string $status = null,
        public ?int $count = null,
        public ?string $desc = null,
        public ?string $type = null,
        public ?int $start_at = null,
        public ?int $end_at = null,
        public ?string $keywords = null,
        public ?string $emails = null,
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
            status: $data['status'] ?? null,
            count: $data['count'] ?? null,
            desc: $data['desc'] ?? null,
            type: $data['type'] ?? null,
            start_at: $data['start_at'] ?? null,
            end_at: $data['end_at'] ?? null,
            keywords: $data['keywords'] ?? null,
            emails: $data['emails'] ?? null,
        );
        return $object;
    }
}
