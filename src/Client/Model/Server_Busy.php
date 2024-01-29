<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Server_Busy
{
    public function __construct(
        /** True if the server is marked as busy (under high load) */
        public ?bool $busy = null,
        /** timestamp - number of seconds since Jan 1, 1970 UTC. */
        public ?int $expires = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['busy'] */
            if (isset($data['busy'])) $this->busy = $data['busy'];
        /** @var int $data['expires'] */
            if (isset($data['expires'])) $this->expires = $data['expires'];
        return $this;
    }
}
