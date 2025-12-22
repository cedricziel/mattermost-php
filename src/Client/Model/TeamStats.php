<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamStats
{
    public function __construct(
        public ?string $team_id = null,
        public ?int $total_member_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TeamStats The hydrated instance
     */
    public static function hydrate(?array $data): TeamStats
    {
        $data ??= [];

        return new self(
            team_id: $data['team_id'] ?? null,
            total_member_count: $data['total_member_count'] ?? null,
        );
    }
}
