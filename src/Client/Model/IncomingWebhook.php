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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['channel_id'] */
            if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        return $this;
    }
}
