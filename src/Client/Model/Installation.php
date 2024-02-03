<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Installation
{
    public function __construct(
        /** A unique identifier */
        public ?string $id = null,
        public $allowed_ip_ranges = null,
        /** The current state of the installation */
        public ?string $state = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            allowed_ip_ranges: $data['allowed_ip_ranges'] ?? null,
            state: $data['state'] ?? null,
        );
        return $object;
    }
}
