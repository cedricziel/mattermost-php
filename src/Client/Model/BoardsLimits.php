<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class BoardsLimits
{
    public function __construct(
        public ?int $cards = null,
        public ?int $views = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            cards: isset($data['cards']) ? $data['cards'] : null,
            views: isset($data['views']) ? $data['views'] : null,
        );
        return $object;
    }
}
