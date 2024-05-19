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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): SearchTeamsResponse {
        $object = new self(
            teams: isset($data['teams']) ? $data['teams'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
