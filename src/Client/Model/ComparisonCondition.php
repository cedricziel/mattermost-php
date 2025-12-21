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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ComparisonCondition {
        $object = new self(
            field_id: isset($data['field_id']) ? $data['field_id'] : null,
            value: isset($data['value']) ? $data['value'] : null,
        );
        return $object;
    }
}
