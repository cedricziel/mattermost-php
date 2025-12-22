<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A mapping of teamIds to teams.
 */
class TeamMap
{
    public function __construct(
        public $team_id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TeamMap The hydrated instance
     */
    public static function hydrate(?array $data): TeamMap
    {
        $data ??= [];

        return new self(
            team_id: $data['team_id'] ?? null,
        );
    }
}
