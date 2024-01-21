<?php

namespace CedricZiel\MattermostPhp\Client;

class UserNotifyProps
{
    /** Set to "true" to enable email notifications, "false" to disable. Defaults to "true". */
    public ?string $email;

    /** Set to "all" to receive push notifications for all activity, "mention" for mentions and direct messages only, and "none" to disable. Defaults to "mention". */
    public ?string $push;

    /** Set to "all" to receive desktop notifications for all activity, "mention" for mentions and direct messages only, and "none" to disable. Defaults to "all". */
    public ?string $desktop;

    /** Set to "true" to enable sound on desktop notifications, "false" to disable. Defaults to "true". */
    public ?string $desktop_sound;

    /** A comma-separated list of words to count as mentions. Defaults to username and @username. */
    public ?string $mention_keys;

    /** Set to "true" to enable channel-wide notifications (@channel, @all, etc.), "false" to disable. Defaults to "true". */
    public ?string $channel;

    /** Set to "true" to enable mentions for first name. Defaults to "true" if a first name is set, "false" otherwise. */
    public ?string $first_name;
}
;