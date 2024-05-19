<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ImportTeamResponse
{
    public function __construct(
        public ?string $results = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            results: isset($data['results']) ? $data['results'] : null,
        );
        return $object;
    }
}
