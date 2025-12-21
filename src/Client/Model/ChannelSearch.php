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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ChannelSearch {
        $object = new self(
            term: isset($data['term']) ? $data['term'] : null,
            team_ids: isset($data['team_ids']) ? $data['team_ids'] : null,
            public: isset($data['public']) ? $data['public'] : null,
            private: isset($data['private']) ? $data['private'] : null,
            deleted: isset($data['deleted']) ? $data['deleted'] : null,
            include_deleted: isset($data['include_deleted']) ? $data['include_deleted'] : null,
        );
        return $object;
    }
}
