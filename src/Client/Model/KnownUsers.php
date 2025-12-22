<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class KnownUsers
{
    public function __construct(
        public ?string $items = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return KnownUsers The hydrated instance
     */
    public static function hydrate(?array $data): KnownUsers
    {
        $data ??= [];

        return new self(
            items: $data['items'] ?? null,
        );
    }
}
