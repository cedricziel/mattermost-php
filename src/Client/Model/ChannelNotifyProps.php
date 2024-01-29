<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelNotifyProps
{
    public function __construct(
        /** Set to "true" to enable email notifications, "false" to disable, or "default" to use the global user notification setting. */
        public ?string $email = null,
        /** Set to "all" to receive push notifications for all activity, "mention" for mentions and direct messages only, "none" to disable, or "default" to use the global user notification setting. */
        public ?string $push = null,
        /** Set to "all" to receive desktop notifications for all activity, "mention" for mentions and direct messages only, "none" to disable, or "default" to use the global user notification setting. */
        public ?string $desktop = null,
        /** Set to "all" to mark the channel unread for any new message, "mention" to mark unread for new mentions only. Defaults to "all". */
        public ?string $mark_unread = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['email'] */
            if (isset($data['email'])) $this->email = $data['email'];
        /** @var string $data['push'] */
            if (isset($data['push'])) $this->push = $data['push'];
        /** @var string $data['desktop'] */
            if (isset($data['desktop'])) $this->desktop = $data['desktop'];
        /** @var string $data['mark_unread'] */
            if (isset($data['mark_unread'])) $this->mark_unread = $data['mark_unread'];
        return $this;
    }
}
