<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SharedChannelRemote
{
    public function __construct(
        /** The id of the shared channel remote */
        public ?string $id = null,
        /** The id of the channel */
        public ?string $channel_id = null,
        /** Id of the user that invited the remote to share the channel */
        public ?string $creator_id = null,
        /** Time in milliseconds that the remote was invited to the channel */
        public ?int $create_at = null,
        /** Time in milliseconds that the shared channel remote record was last updated */
        public ?int $update_at = null,
        /** Time in milliseconds that the shared chanenl remote record was deleted */
        public ?int $delete_at = null,
        /** Indicates if the invite has been accepted by the remote */
        public ?bool $is_invite_accepted = null,
        /** Indicates if the invite has been confirmed by the remote */
        public ?bool $is_invite_confirmed = null,
        /** Id of the remote cluster that the channel is shared with */
        public ?string $remote_id = null,
        /** Time in milliseconds of the last post in the channel that was synchronized with the remote update_at */
        public ?int $last_post_update_at = null,
        /** Id of the last post in the channel that was synchronized with the remote */
        public ?string $last_post_id = null,
        /** Time in milliseconds of the last post in the channel that was synchronized with the remote create_at */
        public ?string $last_post_create_at = null,
        public ?string $last_post_create_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): SharedChannelRemote {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            is_invite_accepted: isset($data['is_invite_accepted']) ? $data['is_invite_accepted'] : null,
            is_invite_confirmed: isset($data['is_invite_confirmed']) ? $data['is_invite_confirmed'] : null,
            remote_id: isset($data['remote_id']) ? $data['remote_id'] : null,
            last_post_update_at: isset($data['last_post_update_at']) ? $data['last_post_update_at'] : null,
            last_post_id: isset($data['last_post_id']) ? $data['last_post_id'] : null,
            last_post_create_at: isset($data['last_post_create_at']) ? $data['last_post_create_at'] : null,
            last_post_create_id: isset($data['last_post_create_id']) ? $data['last_post_create_id'] : null,
        );
        return $object;
    }
}
