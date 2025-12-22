<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Reaction
{
    public function __construct(
        /** The ID of the user that made this reaction */
        public ?string $user_id = null,
        /** The ID of the post to which this reaction was made */
        public ?string $post_id = null,
        /** The name of the emoji that was used for this reaction */
        public ?string $emoji_name = null,
        /** The time in milliseconds this reaction was made */
        public ?int $create_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Reaction The hydrated instance
     */
    public static function hydrate(?array $data): Reaction
    {
        $data ??= [];

        return new self(
            user_id: $data['user_id'] ?? null,
            post_id: $data['post_id'] ?? null,
            emoji_name: $data['emoji_name'] ?? null,
            create_at: $data['create_at'] ?? null,
        );
    }
}
