<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StorageUsage
{
    public function __construct(
        /** Total file storage usage for the instance in bytes rounded down to the most significant digit */
        public ?\number $bytes = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var number $data['bytes'] */
            if (isset($data['bytes'])) $this->bytes = $data['bytes'];
        return $this;
    }
}
