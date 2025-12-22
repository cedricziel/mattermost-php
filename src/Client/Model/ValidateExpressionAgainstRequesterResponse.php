<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ValidateExpressionAgainstRequesterResponse
{
    public function __construct(
        /** Whether the current user matches the expression. */
        public ?bool $requester_matches = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ValidateExpressionAgainstRequesterResponse The hydrated instance
     */
    public static function hydrate(?array $data): ValidateExpressionAgainstRequesterResponse
    {
        $data ??= [];

        return new self(
            requester_matches: $data['requester_matches'] ?? null,
        );
    }
}
