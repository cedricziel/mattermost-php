<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class VisualExpression
{
    public function __construct(
        /** The visual AST for the CEL expression */
        public ?array $conditions = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): VisualExpression {
        $object = new self(
            conditions: isset($data['conditions']) ? $data['conditions'] : null,
        );
        return $object;
    }
}
