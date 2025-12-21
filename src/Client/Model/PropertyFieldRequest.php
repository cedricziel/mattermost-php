<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyFieldRequest
{
    public function __construct(
        /** The name of the property field. */
        public ?string $name = null,
        /** The type of the property field. */
        public ?string $type = null,
        /** Additional attributes for the property field. */
        public ?\stdClass $attrs = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PropertyFieldRequest {
        $object = new self(
            name: isset($data['name']) ? $data['name'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            attrs: isset($data['attrs']) ? $data['attrs'] : null,
        );
        return $object;
    }
}
