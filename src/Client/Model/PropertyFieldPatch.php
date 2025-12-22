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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PropertyFieldPatch The hydrated instance
     */
    public static function hydrate(?array $data): PropertyFieldPatch
    {
        $data ??= [];

        return new self(
            name: $data['name'] ?? null,
            type: $data['type'] ?? null,
            attrs: isset($data['attrs']) ? (object) $data['attrs'] : null,
            target_id: $data['target_id'] ?? null,
            target_type: $data['target_type'] ?? null,
        );
    }
}
