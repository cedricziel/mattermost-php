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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): BridgeAgentInfo {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            displayName: isset($data['displayName']) ? $data['displayName'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            service_id: isset($data['service_id']) ? $data['service_id'] : null,
            service_type: isset($data['service_type']) ? $data['service_type'] : null,
        );
        return $object;
    }
}
