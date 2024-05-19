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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            busy: isset($data['busy']) ? $data['busy'] : null,
            expires: isset($data['expires']) ? $data['expires'] : null,
        );
        return $object;
    }
}
