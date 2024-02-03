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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            users: $data['users'] ?? null,
            out_of_channel: $data['out_of_channel'] ?? null,
        );
        return $object;
    }
}
