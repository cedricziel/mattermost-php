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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Installation The hydrated instance
     */
    public static function hydrate(?array $data): Installation
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            allowed_ip_ranges: $data['allowed_ip_ranges'] ?? null,
            state: $data['state'] ?? null,
        );
    }
}
