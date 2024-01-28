<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnreadAt
{
    /** The ID of the team the channel belongs to. */
    public ?string $team_id;

    /** The ID of the channel the user has access to.. */
    public ?string $channel_id;

    /** No. of messages the user has already read. */
    public ?int $msg_count;

    /** No. of mentions the user has within the unread posts of the channel. */
    public ?int $mention_count;

    /** time in milliseconds when the user last viewed the channel. */
    public ?int $last_viewed_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['team_id'] */
        if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['channel_id'] */
        if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var int $data['msg_count'] */
        if (isset($data['msg_count'])) $this->msg_count = $data['msg_count'];
        /** @var int $data['mention_count'] */
        if (isset($data['mention_count'])) $this->mention_count = $data['mention_count'];
        /** @var int $data['last_viewed_at'] */
        if (isset($data['last_viewed_at'])) $this->last_viewed_at = $data['last_viewed_at'];
        return $this;
    }
}
