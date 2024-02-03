<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamStats
{
    public function __construct(
        public ?string $team_id = null,
        public ?int $total_member_count = null,
        public ?int $active_member_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            total_member_count: isset($data['total_member_count']) ? $data['total_member_count'] : null,
            active_member_count: isset($data['active_member_count']) ? $data['active_member_count'] : null,
        );
        return $object;
    }
}
