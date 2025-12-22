<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ImportTeamResponse
{
    public function __construct(
        public ?string $results = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ImportTeamResponse The hydrated instance
     */
    public static function hydrate(?array $data): ImportTeamResponse
    {
        $data ??= [];

        return new self(
            results: $data['results'] ?? null,
        );
    }
}
