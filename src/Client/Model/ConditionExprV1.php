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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ConditionExprV1 {
        $object = new self(
            and: isset($data['and']) ? $data['and'] : null,
            or: isset($data['or']) ? $data['or'] : null,
            is: isset($data['is']) ? $data['is'] : null,
            isNot: isset($data['isNot']) ? $data['isNot'] : null,
        );
        return $object;
    }
}
