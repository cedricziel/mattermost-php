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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            msg_count: isset($data['msg_count']) ? $data['msg_count'] : null,
            mention_count: isset($data['mention_count']) ? $data['mention_count'] : null,
        );
        return $object;
    }
}
