<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInChannel
{
    public function __construct(
        /** A list of user objects in the channel */
        public ?array $in_channel = null,
        /** A list of user objects not in the channel */
        public ?array $out_of_channel = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserAutocompleteInChannel The hydrated instance
     */
    public static function hydrate(?array $data): UserAutocompleteInChannel
    {
        $data ??= [];

        return new self(
            in_channel: $data['in_channel'] ?? null,
            out_of_channel: $data['out_of_channel'] ?? null,
        );
    }
}
