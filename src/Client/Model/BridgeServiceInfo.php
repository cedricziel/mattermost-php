<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class BridgeServiceInfo
{
    public function __construct(
        /** Unique identifier for the LLM service */
        public ?string $id = null,
        /** Name of the LLM service */
        public ?string $name = null,
        /** Type of the service (e.g., openai, anthropic, azure) */
        public ?string $type = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return BridgeServiceInfo The hydrated instance
     */
    public static function hydrate(?array $data): BridgeServiceInfo
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            type: $data['type'] ?? null,
        );
    }
}
