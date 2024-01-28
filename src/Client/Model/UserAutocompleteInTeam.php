<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInTeam
{
    /** A list of user objects in the team */
    public ?array $in_team;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->in_team = $data['in_team'];
        return $this;
    }
}
