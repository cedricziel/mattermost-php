<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * List of user's categories with their channels
 */
class OrderedSidebarCategories
{
    public ?array $order;
    public ?array $categories;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->order = $data['order'];
        $this->categories = $data['categories'];
        return $this;
    }
}
