<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelSearch
{
    public function __construct(
        /** The string to search in the channel name, display name, and purpose. */
        public ?string $term = null,
        /** Filters results to channels belonging to the given team ids. */
        public ?array $team_ids = null,
        /** Filters results to only return Public / Open channels. */
        public ?bool $public = null,
        /** Filters results to only return Private channels. */
        public ?bool $private = null,
        /** Filters results to only return deleted / archived channels. */
        public ?bool $deleted = null,
        /** Whether to include deleted channels in the search results. */
        public ?bool $include_deleted = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelSearch The hydrated instance
     */
    public static function hydrate(?array $data): ChannelSearch
    {
        $data ??= [];

        return new self(
            term: $data['term'] ?? null,
            team_ids: $data['team_ids'] ?? null,
            public: $data['public'] ?? null,
            private: $data['private'] ?? null,
            deleted: $data['deleted'] ?? null,
            include_deleted: $data['include_deleted'] ?? null,
        );
    }
}
