<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class BridgeAgentInfo
{
    public function __construct(
        /** Unique identifier for the agent */
        public ?string $id = null,
        /** Human-readable name for the agent */
        public ?string $displayName = null,
        /** Username associated with the agent bot */
        public ?string $username = null,
        /** ID of the service providing this agent */
        public ?string $service_id = null,
        /** Type of the service (e.g., openai, anthropic) */
        public ?string $service_type = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return BridgeAgentInfo The hydrated instance
     */
    public static function hydrate(?array $data): BridgeAgentInfo
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            displayName: $data['displayName'] ?? null,
            username: $data['username'] ?? null,
            service_id: $data['service_id'] ?? null,
            service_type: $data['service_type'] ?? null,
        );
    }
}
