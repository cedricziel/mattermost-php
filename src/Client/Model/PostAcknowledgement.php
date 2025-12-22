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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PostAcknowledgement The hydrated instance
     */
    public static function hydrate(?array $data): PostAcknowledgement
    {
        $data ??= [];

        return new self(
            user_id: $data['user_id'] ?? null,
            post_id: $data['post_id'] ?? null,
            acknowledged_at: $data['acknowledged_at'] ?? null,
        );
    }
}
