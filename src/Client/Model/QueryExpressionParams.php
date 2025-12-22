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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return QueryExpressionParams The hydrated instance
     */
    public static function hydrate(?array $data): QueryExpressionParams
    {
        $data ??= [];

        return new self(
            expression: $data['expression'] ?? null,
            term: $data['term'] ?? null,
            limit: $data['limit'] ?? null,
            after: $data['after'] ?? null,
            channelId: $data['channelId'] ?? null,
        );
    }
}
