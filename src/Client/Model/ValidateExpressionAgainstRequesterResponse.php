<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ValidateExpressionAgainstRequesterResponse
{
    public function __construct(
        /** Whether the current user matches the expression. */
        public ?bool $requester_matches = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ValidateExpressionAgainstRequesterResponse {
        $object = new self(
            requester_matches: isset($data['requester_matches']) ? $data['requester_matches'] : null,
        );
        return $object;
    }
}
