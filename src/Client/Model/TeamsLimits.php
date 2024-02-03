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
        $object = new self(
            active: isset($data['active']) ? $data['active'] : null,
        );
        return $object;
    }
}
