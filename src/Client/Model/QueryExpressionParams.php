<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class QueryExpressionParams
{
    public function __construct(
        /** The policy expression to test. */
        public ?string $expression = null,
        /** A search term to filter users against whom the expression is tested. */
        public ?string $term = null,
        /** The maximum number of users to return. */
        public ?int $limit = null,
        /** The ID of the user to start the test after (for pagination). */
        public ?string $after = null,
        /** The channel ID to contextually test the expression against (required for channel admins). */
        public ?string $channelId = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): QueryExpressionParams {
        $object = new self(
            expression: isset($data['expression']) ? $data['expression'] : null,
            term: isset($data['term']) ? $data['term'] : null,
            limit: isset($data['limit']) ? $data['limit'] : null,
            after: isset($data['after']) ? $data['after'] : null,
            channelId: isset($data['channelId']) ? $data['channelId'] : null,
        );
        return $object;
    }
}
