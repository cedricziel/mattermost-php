<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A mapping of teamIds to teams.
 */
class TeamMap
{
    public $team_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->team_id = $data['team_id'];
        return $this;
    }
}
