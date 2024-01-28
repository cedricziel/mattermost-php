<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Emoji
{
    /** The ID of the emoji */
    public ?string $id;

    /** The ID of the user that made the emoji */
    public ?string $creator_id;

    /** The name of the emoji */
    public ?string $name;

    /** The time in milliseconds the emoji was made */
    public ?int $create_at;

    /** The time in milliseconds the emoji was last updated */
    public ?int $update_at;

    /** The time in milliseconds the emoji was deleted */
    public ?int $delete_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['creator_id'] */
        if (isset($data['creator_id'])) $this->creator_id = $data['creator_id'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
        if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        return $this;
    }
}
