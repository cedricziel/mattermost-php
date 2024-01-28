<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostAcknowledgement
{
    /** The ID of the user that made this acknowledgement. */
    public ?string $user_id;

    /** The ID of the post to which this acknowledgement was made. */
    public ?string $post_id;

    /** The time in milliseconds in which this acknowledgement was made. */
    public ?int $acknowledged_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['post_id'] */
        if (isset($data['post_id'])) $this->post_id = $data['post_id'];
        /** @var int $data['acknowledged_at'] */
        if (isset($data['acknowledged_at'])) $this->acknowledged_at = $data['acknowledged_at'];
        return $this;
    }
}
