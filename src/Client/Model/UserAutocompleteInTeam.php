<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInTeam
{
    public function __construct(
        /** A list of user objects in the team */
        public ?array $in_team = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserAutocompleteInTeam The hydrated instance
     */
    public static function hydrate(?array $data): UserAutocompleteInTeam
    {
        $data ??= [];

        return new self(
            in_team: $data['in_team'] ?? null,
        );
    }
}
