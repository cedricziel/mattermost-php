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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['title'] */
        if (isset($data['title'])) $this->title = $data['title'];
        /** @var array $data['items'] */
        if (isset($data['items'])) $this->items = $data['items'];
        return $this;
    }
}
