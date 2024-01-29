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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var  $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        return $this;
    }
}
