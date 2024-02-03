<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class KnownUsers
{
    public function __construct(
        public ?string $items = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            items: $data['items'] ?? null,
        );
        return $object;
    }
}
