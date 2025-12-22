<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamExists
{
    public function __construct(
        public ?bool $exists = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TeamExists The hydrated instance
     */
    public static function hydrate(?array $data): TeamExists
    {
        $data ??= [];

        return new self(
            exists: $data['exists'] ?? null,
        );
    }
}
