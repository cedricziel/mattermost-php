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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            channels: isset($data['channels']) ? $data['channels'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
