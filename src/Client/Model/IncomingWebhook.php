<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IncomingWebhook
{
    public function __construct(
        /** The unique identifier for this incoming webhook */
        public ?string $id = null,
        /** The time in milliseconds a incoming webhook was created */
        public ?int $create_at = null,
        /** The time in milliseconds a incoming webhook was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a incoming webhook was deleted */
        public ?int $delete_at = null,
        /** The ID of a public channel or private group that receives the webhook payloads */
        public ?string $channel_id = null,
        /** The description for this incoming webhook */
        public ?string $description = null,
        /** The display name for this incoming webhook */
        public ?string $display_name = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return IncomingWebhook The hydrated instance
     */
    public static function hydrate(?array $data): IncomingWebhook
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            channel_id: $data['channel_id'] ?? null,
            description: $data['description'] ?? null,
            display_name: $data['display_name'] ?? null,
        );
    }
}
