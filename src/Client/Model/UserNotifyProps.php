<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserNotifyProps
{
    public function __construct(
        /** Set to "true" to enable email notifications, "false" to disable. Defaults to "true". */
        public ?string $email = null,
        /** Set to "all" to receive push notifications for all activity, "mention" for mentions and direct messages only, and "none" to disable. Defaults to "mention". */
        public ?string $push = null,
        /** Set to "all" to receive desktop notifications for all activity, "mention" for mentions and direct messages only, and "none" to disable. Defaults to "all". */
        public ?string $desktop = null,
        /** Set to "true" to enable sound on desktop notifications, "false" to disable. Defaults to "true". */
        public ?string $desktop_sound = null,
        /** A comma-separated list of words to count as mentions. Defaults to username and @username. */
        public ?string $mention_keys = null,
        /** Set to "true" to enable channel-wide notifications (@channel, @all, etc.), "false" to disable. Defaults to "true". */
        public ?string $channel = null,
        /** Set to "true" to enable mentions for first name. Defaults to "true" if a first name is set, "false" otherwise. */
        public ?string $first_name = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): UserNotifyProps {
        $object = new self(
            email: isset($data['email']) ? $data['email'] : null,
            push: isset($data['push']) ? $data['push'] : null,
            desktop: isset($data['desktop']) ? $data['desktop'] : null,
            desktop_sound: isset($data['desktop_sound']) ? $data['desktop_sound'] : null,
            mention_keys: isset($data['mention_keys']) ? $data['mention_keys'] : null,
            channel: isset($data['channel']) ? $data['channel'] : null,
            first_name: isset($data['first_name']) ? $data['first_name'] : null,
        );
        return $object;
    }
}
