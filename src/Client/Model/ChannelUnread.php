<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnread
{
    public function __construct(
        public ?string $team_id = null,
        public ?string $channel_id = null,
        public ?int $msg_count = null,
        public ?int $mention_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelUnread The hydrated instance
     */
    public static function hydrate(?array $data): ChannelUnread
    {
        $data ??= [];

        return new self(
            team_id: $data['team_id'] ?? null,
            channel_id: $data['channel_id'] ?? null,
            msg_count: $data['msg_count'] ?? null,
            mention_count: $data['mention_count'] ?? null,
        );
    }
}
