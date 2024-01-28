<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnread
{
    public ?string $team_id;
    public ?string $channel_id;
    public ?int $msg_count;
    public ?int $mention_count;

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
        return $this;
    }
}
