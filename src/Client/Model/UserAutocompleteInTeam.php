<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInTeam
{
    public function __construct(
        /** A list of user objects in the team */
        public ?array $in_team = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            in_team: isset($data['in_team']) ? $data['in_team'] : null,
        );
        return $object;
    }
}
