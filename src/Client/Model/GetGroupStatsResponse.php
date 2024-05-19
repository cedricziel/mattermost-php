<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetGroupStatsResponse
{
    public function __construct(
        public ?string $group_id = null,
        public ?int $total_member_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetGroupStatsResponse {
        $object = new self(
            group_id: isset($data['group_id']) ? $data['group_id'] : null,
            total_member_count: isset($data['total_member_count']) ? $data['total_member_count'] : null,
        );
        return $object;
    }
}
