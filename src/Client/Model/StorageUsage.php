<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StorageUsage
{
    public function __construct(
        /** Total file storage usage for the instance in bytes rounded down to the most significant digit */
        public ?\number $bytes = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            bytes: $data['bytes'] ?? null,
        );
        return $object;
    }
}
