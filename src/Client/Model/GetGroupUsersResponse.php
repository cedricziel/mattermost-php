<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetGroupUsersResponse
{
    public function __construct(
        public ?array $members = null,
        public ?int $total_member_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetGroupUsersResponse {
        $object = new self(
            members: isset($data['members']) ? $data['members'] : null,
            total_member_count: isset($data['total_member_count']) ? $data['total_member_count'] : null,
        );
        return $object;
    }
}
