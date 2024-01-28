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
        /** @var array $data['order'] */
        if (isset($data['order'])) $this->order = $data['order'];
        /** @var array $data['categories'] */
        if (isset($data['categories'])) $this->categories = $data['categories'];
        return $this;
    }
}
