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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            post_id: isset($data['post_id']) ? $data['post_id'] : null,
            emoji_name: isset($data['emoji_name']) ? $data['emoji_name'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
        );
        return $object;
    }
}
