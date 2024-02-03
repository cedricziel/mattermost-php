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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            order: isset($data['order']) ? $data['order'] : null,
            categories: isset($data['categories']) ? $data['categories'] : null,
        );
        return $object;
    }
}
