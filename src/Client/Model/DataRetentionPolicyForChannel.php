<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyForChannel
{
    /** The channel ID. */
    public ?string $channel_id;

    /** The number of days a message will be retained before being deleted by this policy. */
    public ?int $post_duration;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->channel_id = $data['channel_id'];
        $this->post_duration = $data['post_duration'];
        return $this;
    }
}
