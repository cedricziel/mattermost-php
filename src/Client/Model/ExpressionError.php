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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ExpressionError {
        $object = new self(
            message: isset($data['message']) ? $data['message'] : null,
            field: isset($data['field']) ? $data['field'] : null,
            line: isset($data['line']) ? $data['line'] : null,
            column: isset($data['column']) ? $data['column'] : null,
        );
        return $object;
    }
}
