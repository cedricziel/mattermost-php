<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Preference
{
    public function __construct(
        /** The ID of the user that owns this preference */
        public ?string $user_id = null,
        public ?string $category = null,
        public ?string $name = null,
        public ?string $value = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            user_id: $data['user_id'] ?? null,
            category: $data['category'] ?? null,
            name: $data['name'] ?? null,
            value: $data['value'] ?? null,
        );
        return $object;
    }
}
