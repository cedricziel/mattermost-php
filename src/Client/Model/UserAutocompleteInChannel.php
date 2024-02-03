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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            in_channel: isset($data['in_channel']) ? $data['in_channel'] : null,
            out_of_channel: isset($data['out_of_channel']) ? $data['out_of_channel'] : null,
        );
        return $object;
    }
}
