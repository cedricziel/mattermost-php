<?php

namespace CedricZiel\MattermostPhp\Client;

class ChannelNotifyProps
{
    /** Set to "true" to enable email notifications, "false" to disable, or "default" to use the global user notification setting. */
    public ?string $email;

    /** Set to "all" to receive push notifications for all activity, "mention" for mentions and direct messages only, "none" to disable, or "default" to use the global user notification setting. */
    public ?string $push;

    /** Set to "all" to receive desktop notifications for all activity, "mention" for mentions and direct messages only, "none" to disable, or "default" to use the global user notification setting. */
    public ?string $desktop;

    /** Set to "all" to mark the channel unread for any new message, "mention" to mark unread for new mentions only. Defaults to "all". */
    public ?string $mark_unread;
}
;