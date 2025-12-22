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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Server_Busy The hydrated instance
     */
    public static function hydrate(?array $data): Server_Busy
    {
        $data ??= [];

        return new self(
            busy: $data['busy'] ?? null,
            expires: $data['expires'] ?? null,
        );
    }
}
