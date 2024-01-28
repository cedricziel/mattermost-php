<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Server_Busy
{
    /** True if the server is marked as busy (under high load) */
    public ?bool $busy;

    /** timestamp - number of seconds since Jan 1, 1970 UTC. */
    public ?int $expires;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->busy = $data['busy'];
        $this->expires = $data['expires'];
        return $this;
    }
}
