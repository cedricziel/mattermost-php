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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ScheduledPost The hydrated instance
     */
    public static function hydrate(?array $data): ScheduledPost
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            user_id: $data['user_id'] ?? null,
            channel_id: $data['channel_id'] ?? null,
            root_id: $data['root_id'] ?? null,
            message: $data['message'] ?? null,
            props: isset($data['props']) ? (object) $data['props'] : null,
            file_ids: $data['file_ids'] ?? null,
            scheduled_at: $data['scheduled_at'] ?? null,
            processed_at: $data['processed_at'] ?? null,
            error_code: $data['error_code'] ?? null,
            metadata: $data['metadata'] ?? null,
        );
    }
}
