<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A logical condition expression that can combine multiple conditions using AND/OR operators, or perform field comparisons using Is/IsNot operators.
 */
class ConditionExprV1
{
    public function __construct(
        /** Logical AND operation. All conditions in the array must be true. */
        public ?array $and = null,
        /** Logical OR operation. At least one condition in the array must be true. */
        public ?array $or = null,
        public $is = null,
        public $isNot = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ConditionExprV1 The hydrated instance
     */
    public static function hydrate(?array $data): ConditionExprV1
    {
        $data ??= [];

        return new self(
            and: $data['and'] ?? null,
            or: $data['or'] ?? null,
            is: $data['is'] ?? null,
            isNot: $data['isNot'] ?? null,
        );
    }
}
