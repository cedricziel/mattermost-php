<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyFieldPatch
{
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        public ?\stdClass $attrs = null,
        public ?string $target_id = null,
        public ?string $target_type = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PropertyFieldPatch {
        $object = new self(
            name: isset($data['name']) ? $data['name'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            attrs: isset($data['attrs']) ? $data['attrs'] : null,
            target_id: isset($data['target_id']) ? $data['target_id'] : null,
            target_type: isset($data['target_type']) ? $data['target_type'] : null,
        );
        return $object;
    }
}
