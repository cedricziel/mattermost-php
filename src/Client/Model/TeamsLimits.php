<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamsLimits
{
    public function __construct(
        public ?int $active = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TeamsLimits The hydrated instance
     */
    public static function hydrate(?array $data): TeamsLimits
    {
        $data ??= [];

        return new self(
            active: $data['active'] ?? null,
        );
    }
}
