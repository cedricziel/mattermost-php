<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class BoardsLimits
{
    public function __construct(
        public ?int $cards = null,
        public ?int $views = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return BoardsLimits The hydrated instance
     */
    public static function hydrate(?array $data): BoardsLimits
    {
        $data ??= [];

        return new self(
            cards: $data['cards'] ?? null,
            views: $data['views'] ?? null,
        );
    }
}
