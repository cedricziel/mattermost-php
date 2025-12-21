<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AgentsResponse
{
    public function __construct(
        /** List of available agents */
        public ?array $agents = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AgentsResponse {
        $object = new self(
            agents: isset($data['agents']) ? $data['agents'] : null,
        );
        return $object;
    }
}
