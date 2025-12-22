<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StorageUsage
{
    public function __construct(
        /** Total file storage usage for the instance in bytes rounded down to the most significant digit */
        public ?int $bytes = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return StorageUsage The hydrated instance
     */
    public static function hydrate(?array $data): StorageUsage
    {
        $data ??= [];

        return new self(
            bytes: $data['bytes'] ?? null,
        );
    }
}
