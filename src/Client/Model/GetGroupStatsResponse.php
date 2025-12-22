<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetGroupStatsResponse
{
    public function __construct(
        public ?string $group_id = null,
        public ?int $total_member_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetGroupStatsResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetGroupStatsResponse
    {
        $data ??= [];

        return new self(
            group_id: $data['group_id'] ?? null,
            total_member_count: $data['total_member_count'] ?? null,
        );
    }
}
