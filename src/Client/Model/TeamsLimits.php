<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamsLimits
{
    public function __construct(
        public ?int $active = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            active: $data['active'] ?? null,
        );
        return $object;
    }
}
