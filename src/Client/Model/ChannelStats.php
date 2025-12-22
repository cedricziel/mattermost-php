<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelStats
{
    public function __construct(
        public ?string $channel_id = null,
        public ?int $member_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelStats The hydrated instance
     */
    public static function hydrate(?array $data): ChannelStats
    {
        $data ??= [];

        return new self(
            channel_id: $data['channel_id'] ?? null,
            member_count: $data['member_count'] ?? null,
        );
    }
}
