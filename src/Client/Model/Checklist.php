<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Checklist
{
    /** A unique, 26 characters long, alphanumeric identifier for the checklist. */
    public ?string $id;

    /** The title of the checklist. */
    public ?string $title;

    /** The list of tasks to do. */
    public ?array $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->items = $data['items'];
        return $this;
    }
}
