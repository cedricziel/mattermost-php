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
