<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ComparisonCondition
{
    public function __construct(
        /** The identifier of the field to compare against. */
        public ?string $field_id = null,
        /** The value to compare with. Format depends on the field type. Stored as JSON. */
        public $value = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ComparisonCondition The hydrated instance
     */
    public static function hydrate(?array $data): ComparisonCondition
    {
        $data ??= [];

        return new self(
            field_id: $data['field_id'] ?? null,
            value: $data['value'] ?? null,
        );
    }
}
