<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IncomingWebhook
{
    /** The unique identifier for this incoming webhook */
    public ?string $id;

    /** The time in milliseconds a incoming webhook was created */
    public ?int $create_at;

    /** The time in milliseconds a incoming webhook was last updated */
    public ?int $update_at;

    /** The time in milliseconds a incoming webhook was deleted */
    public ?int $delete_at;

    /** The ID of a public channel or private group that receives the webhook payloads */
    public ?string $channel_id;

    /** The description for this incoming webhook */
    public ?string $description;

    /** The display name for this incoming webhook */
    public ?string $display_name;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->channel_id = $data['channel_id'];
        $this->description = $data['description'];
        $this->display_name = $data['display_name'];
        return $this;
    }
}
