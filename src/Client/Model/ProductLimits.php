<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ProductLimits
{
    public function __construct(
        public $boards = null,
        public $files = null,
        public $integrations = null,
        public $messages = null,
        public $teams = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            boards: $data['boards'] ?? null,
            files: $data['files'] ?? null,
            integrations: $data['integrations'] ?? null,
            messages: $data['messages'] ?? null,
            teams: $data['teams'] ?? null,
        );
        return $object;
    }
}
