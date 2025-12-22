<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchTeamsResponse
{
    public function __construct(
        /** The teams that matched the query. */
        public ?array $teams = null,
        /** The total number of results, regardless of page and per_page requested. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SearchTeamsResponse The hydrated instance
     */
    public static function hydrate(?array $data): SearchTeamsResponse
    {
        $data ??= [];

        return new self(
            teams: $data['teams'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
