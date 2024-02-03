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
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            status: isset($data['status']) ? $data['status'] : null,
            count: isset($data['count']) ? $data['count'] : null,
            desc: isset($data['desc']) ? $data['desc'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            start_at: isset($data['start_at']) ? $data['start_at'] : null,
            end_at: isset($data['end_at']) ? $data['end_at'] : null,
            keywords: isset($data['keywords']) ? $data['keywords'] : null,
            emails: isset($data['emails']) ? $data['emails'] : null,
        );
        return $object;
    }
}
