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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): BridgeServiceInfo {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            type: isset($data['type']) ? $data['type'] : null,
        );
        return $object;
    }
}
