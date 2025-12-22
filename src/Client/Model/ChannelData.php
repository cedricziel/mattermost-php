<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelData
{
    public function __construct(
        public $channel = null,
        public $member = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelData The hydrated instance
     */
    public static function hydrate(?array $data): ChannelData
    {
        $data ??= [];

        return new self(
            channel: $data['channel'] ?? null,
            member: $data['member'] ?? null,
        );
    }
}
