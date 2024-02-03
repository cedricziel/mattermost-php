<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Checklist
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the checklist. */
        public ?string $id = null,
        /** The title of the checklist. */
        public ?string $title = null,
        /** The list of tasks to do. */
        public ?array $items = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            title: $data['title'] ?? null,
            items: $data['items'] ?? null,
        );
        return $object;
    }
}
