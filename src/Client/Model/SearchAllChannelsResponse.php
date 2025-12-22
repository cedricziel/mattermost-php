<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchAllChannelsResponse
{
    public function __construct(
        /** The channels that matched the query. */
        public ?array $channels = null,
        /** The total number of results, regardless of page and per_page requested. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SearchAllChannelsResponse The hydrated instance
     */
    public static function hydrate(?array $data): SearchAllChannelsResponse
    {
        $data ??= [];

        return new self(
            channels: $data['channels'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
