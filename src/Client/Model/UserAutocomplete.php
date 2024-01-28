<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocomplete
{
    /** A list of users that are the main result of the query */
    public ?array $users;

    /** A special case list of users returned when autocompleting in a specific channel. Omitted when empty or not relevant */
    public ?array $out_of_channel;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['users'] */
        if (isset($data['users'])) $this->users = $data['users'];
        /** @var array $data['out_of_channel'] */
        if (isset($data['out_of_channel'])) $this->out_of_channel = $data['out_of_channel'];
        return $this;
    }
}
