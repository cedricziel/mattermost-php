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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
        );
        return $object;
    }
}
