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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Checklist The hydrated instance
     */
    public static function hydrate(?array $data): Checklist
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            title: $data['title'] ?? null,
            items: $data['items'] ?? null,
        );
    }
}
