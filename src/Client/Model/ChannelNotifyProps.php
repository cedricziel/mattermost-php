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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            email: isset($data['email']) ? $data['email'] : null,
            push: isset($data['push']) ? $data['push'] : null,
            desktop: isset($data['desktop']) ? $data['desktop'] : null,
            mark_unread: isset($data['mark_unread']) ? $data['mark_unread'] : null,
        );
        return $object;
    }
}
