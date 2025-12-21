<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ScheduledPost
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a scheduled post was created */
        public ?int $create_at = null,
        /** The time in milliseconds a scheduled post was last updated */
        public ?int $update_at = null,
        public ?string $user_id = null,
        public ?string $channel_id = null,
        public ?string $root_id = null,
        public ?string $message = null,
        public ?\stdClass $props = null,
        public ?array $file_ids = null,
        /** The time in milliseconds a scheduled post is scheduled to be sent at */
        public ?int $scheduled_at = null,
        /** The time in milliseconds a scheduled post was processed at */
        public ?int $processed_at = null,
        /** Explains the error behind why a scheduled post could not have been sent */
        public ?string $error_code = null,
        public $metadata = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ScheduledPost {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            root_id: isset($data['root_id']) ? $data['root_id'] : null,
            message: isset($data['message']) ? $data['message'] : null,
            props: isset($data['props']) ? $data['props'] : null,
            file_ids: isset($data['file_ids']) ? $data['file_ids'] : null,
            scheduled_at: isset($data['scheduled_at']) ? $data['scheduled_at'] : null,
            processed_at: isset($data['processed_at']) ? $data['processed_at'] : null,
            error_code: isset($data['error_code']) ? $data['error_code'] : null,
            metadata: isset($data['metadata']) ? $data['metadata'] : null,
        );
        return $object;
    }
}
