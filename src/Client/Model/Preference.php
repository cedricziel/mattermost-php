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
        $object = new self(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            category: isset($data['category']) ? $data['category'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            value: isset($data['value']) ? $data['value'] : null,
        );
        return $object;
    }
}
