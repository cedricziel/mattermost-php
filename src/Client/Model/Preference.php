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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['category'] */
        if (isset($data['category'])) $this->category = $data['category'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['value'] */
        if (isset($data['value'])) $this->value = $data['value'];
        return $this;
    }
}
