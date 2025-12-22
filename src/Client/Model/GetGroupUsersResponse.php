<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetGroupUsersResponse
{
    public function __construct(
        public ?array $members = null,
        public ?int $total_member_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetGroupUsersResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetGroupUsersResponse
    {
        $data ??= [];

        return new self(
            members: $data['members'] ?? null,
            total_member_count: $data['total_member_count'] ?? null,
        );
    }
}
