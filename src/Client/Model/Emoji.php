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
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->creator_id = $data['creator_id'];
        $this->name = $data['name'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        return $this;
    }
}
