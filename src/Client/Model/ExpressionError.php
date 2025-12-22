<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ExpressionError
{
    public function __construct(
        /** The error message. */
        public ?string $message = null,
        /** The field related to the error, if applicable. */
        public ?string $field = null,
        /** The line number where the error occurred in the expression. */
        public ?int $line = null,
        /** The column number where the error occurred in the expression. */
        public ?int $column = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ExpressionError The hydrated instance
     */
    public static function hydrate(?array $data): ExpressionError
    {
        $data ??= [];

        return new self(
            message: $data['message'] ?? null,
            field: $data['field'] ?? null,
            line: $data['line'] ?? null,
            column: $data['column'] ?? null,
        );
    }
}
