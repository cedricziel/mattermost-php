<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostAcknowledgement
{
    public function __construct(
        /** The ID of the user that made this acknowledgement. */
        public ?string $user_id = null,
        /** The ID of the post to which this acknowledgement was made. */
        public ?string $post_id = null,
        /** The time in milliseconds in which this acknowledgement was made. */
        public ?int $acknowledged_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            post_id: isset($data['post_id']) ? $data['post_id'] : null,
            acknowledged_at: isset($data['acknowledged_at']) ? $data['acknowledged_at'] : null,
        );
        return $object;
    }
}
