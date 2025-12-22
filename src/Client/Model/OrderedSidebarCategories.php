<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * List of user's categories with their channels
 */
class OrderedSidebarCategories
{
    public function __construct(
        public ?array $order = null,
        public ?array $categories = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return OrderedSidebarCategories The hydrated instance
     */
    public static function hydrate(?array $data): OrderedSidebarCategories
    {
        $data ??= [];

        return new self(
            order: $data['order'] ?? null,
            categories: $data['categories'] ?? null,
        );
    }
}
