<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class VisualExpression
{
    public function __construct(
        /** The visual AST for the CEL expression */
        public ?array $conditions = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return VisualExpression The hydrated instance
     */
    public static function hydrate(?array $data): VisualExpression
    {
        $data ??= [];

        return new self(
            conditions: $data['conditions'] ?? null,
        );
    }
}
