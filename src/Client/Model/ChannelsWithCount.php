<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelsWithCount
{
    public function __construct(
        public $channels = null,
        /** The total number of channels. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelsWithCount The hydrated instance
     */
    public static function hydrate(?array $data): ChannelsWithCount
    {
        $data ??= [];

        return new self(
            channels: $data['channels'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
