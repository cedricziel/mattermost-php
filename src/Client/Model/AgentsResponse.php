<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AgentsResponse
{
    public function __construct(
        /** List of available agents */
        public ?array $agents = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AgentsResponse The hydrated instance
     */
    public static function hydrate(?array $data): AgentsResponse
    {
        $data ??= [];

        return new self(
            agents: $data['agents'] ?? null,
        );
    }
}
