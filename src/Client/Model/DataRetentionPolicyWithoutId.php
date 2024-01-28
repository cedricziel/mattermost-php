<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyWithoutId
{
    /** The display name for this retention policy. */
    public ?string $display_name;

    /**
     * The number of days a message will be retained before being deleted by this policy. If this value is less than 0, the policy has infinite retention (i.e. messages are never deleted).
     */
    public ?int $post_duration;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->display_name = $data['display_name'];
        $this->post_duration = $data['post_duration'];
        return $this;
    }
}
