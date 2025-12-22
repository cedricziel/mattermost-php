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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelNotifyProps The hydrated instance
     */
    public static function hydrate(?array $data): ChannelNotifyProps
    {
        $data ??= [];

        return new self(
            email: $data['email'] ?? null,
            push: $data['push'] ?? null,
            desktop: $data['desktop'] ?? null,
            mark_unread: $data['mark_unread'] ?? null,
        );
    }
}
