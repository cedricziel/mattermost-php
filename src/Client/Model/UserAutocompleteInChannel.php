<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInChannel
{
    /** A list of user objects in the channel */
    public ?array $in_channel;

    /** A list of user objects not in the channel */
    public ?array $out_of_channel;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['in_channel'] */
        if (isset($data['in_channel'])) $this->in_channel = $data['in_channel'];
        /** @var array $data['out_of_channel'] */
        if (isset($data['out_of_channel'])) $this->out_of_channel = $data['out_of_channel'];
        return $this;
    }
}
