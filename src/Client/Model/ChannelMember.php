<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelMember
{
    public function __construct(
        public ?string $channel_id = null,
        public ?string $user_id = null,
        public ?string $roles = null,
        /** The time in milliseconds the channel was last viewed by the user */
        public ?int $last_viewed_at = null,
        public ?int $msg_count = null,
        public ?int $mention_count = null,
        public $notify_props = null,
        /** The time in milliseconds the channel member was last updated */
        public ?int $last_update_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelMember The hydrated instance
     */
    public static function hydrate(?array $data): ChannelMember
    {
        $data ??= [];

        return new self(
            channel_id: $data['channel_id'] ?? null,
            user_id: $data['user_id'] ?? null,
            roles: $data['roles'] ?? null,
            last_viewed_at: $data['last_viewed_at'] ?? null,
            msg_count: $data['msg_count'] ?? null,
            mention_count: $data['mention_count'] ?? null,
            notify_props: $data['notify_props'] ?? null,
            last_update_at: $data['last_update_at'] ?? null,
        );
    }
}
