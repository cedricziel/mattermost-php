<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnreadAt
{
    public function __construct(
        /** The ID of the team the channel belongs to. */
        public ?string $team_id = null,
        /** The ID of the channel the user has access to.. */
        public ?string $channel_id = null,
        /** No. of messages the user has already read. */
        public ?int $msg_count = null,
        /** No. of mentions the user has within the unread posts of the channel. */
        public ?int $mention_count = null,
        /** time in milliseconds when the user last viewed the channel. */
        public ?int $last_viewed_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            msg_count: isset($data['msg_count']) ? $data['msg_count'] : null,
            mention_count: isset($data['mention_count']) ? $data['mention_count'] : null,
            last_viewed_at: isset($data['last_viewed_at']) ? $data['last_viewed_at'] : null,
        );
        return $object;
    }
}
