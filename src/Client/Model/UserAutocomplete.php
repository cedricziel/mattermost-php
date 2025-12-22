<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocomplete
{
    public function __construct(
        /** A list of users that are the main result of the query */
        public ?array $users = null,
        /** A special case list of users returned when autocompleting in a specific channel. Omitted when empty or not relevant */
        public ?array $out_of_channel = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserAutocomplete The hydrated instance
     */
    public static function hydrate(?array $data): UserAutocomplete
    {
        $data ??= [];

        return new self(
            users: $data['users'] ?? null,
            out_of_channel: $data['out_of_channel'] ?? null,
        );
    }
}
