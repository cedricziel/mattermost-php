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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ChannelsWithCount {
        $object = new self(
            channels: isset($data['channels']) ? $data['channels'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
