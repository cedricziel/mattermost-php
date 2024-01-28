<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Reaction
{
    /** The ID of the user that made this reaction */
    public ?string $user_id;

    /** The ID of the post to which this reaction was made */
    public ?string $post_id;

    /** The name of the emoji that was used for this reaction */
    public ?string $emoji_name;

    /** The time in milliseconds this reaction was made */
    public ?int $create_at;

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
        /** @var string $data['emoji_name'] */
        if (isset($data['emoji_name'])) $this->emoji_name = $data['emoji_name'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        return $this;
    }
}
