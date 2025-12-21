<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyValueRequest
{
    public function __construct(
        /** The JSON-encoded value to set for the property. */
        public ?string $value = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PropertyValueRequest {
        $object = new self(
            value: isset($data['value']) ? $data['value'] : null,
        );
        return $object;
    }
}
