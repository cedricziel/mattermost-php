<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Preference
{
    /** The ID of the user that owns this preference */
    public ?string $user_id;
    public ?string $category;
    public ?string $name;
    public ?string $value;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->user_id = $data['user_id'];
        $this->category = $data['category'];
        $this->name = $data['name'];
        $this->value = $data['value'];
        return $this;
    }
}
