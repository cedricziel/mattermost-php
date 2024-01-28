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
        $this->users = $data['users'];
        $this->out_of_channel = $data['out_of_channel'];
        return $this;
    }
}
