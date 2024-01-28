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
        /** @var string $data['channel_id'] */
        if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var int $data['post_duration'] */
        if (isset($data['post_duration'])) $this->post_duration = $data['post_duration'];
        return $this;
    }
}
