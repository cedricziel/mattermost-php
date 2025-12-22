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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ProductLimits The hydrated instance
     */
    public static function hydrate(?array $data): ProductLimits
    {
        $data ??= [];

        return new self(
            boards: $data['boards'] ?? null,
            files: $data['files'] ?? null,
            integrations: $data['integrations'] ?? null,
            messages: $data['messages'] ?? null,
            teams: $data['teams'] ?? null,
        );
    }
}
