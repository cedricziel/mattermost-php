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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Preference The hydrated instance
     */
    public static function hydrate(?array $data): Preference
    {
        $data ??= [];

        return new self(
            user_id: $data['user_id'] ?? null,
            category: $data['category'] ?? null,
            name: $data['name'] ?? null,
            value: $data['value'] ?? null,
        );
    }
}
