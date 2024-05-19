<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StorageUsage
{
    public function __construct(
        /** Total file storage usage for the instance in bytes rounded down to the most significant digit */
        public ?int $bytes = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            bytes: isset($data['bytes']) ? $data['bytes'] : null,
        );
        return $object;
    }
}
