<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInTeam
{
    public function __construct(
        /** A list of user objects in the team */
        public ?array $in_team = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['in_team'] */
            if (isset($data['in_team'])) $this->in_team = $data['in_team'];
        return $this;
    }
}
