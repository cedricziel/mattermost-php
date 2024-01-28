<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StorageUsage
{
    /** Total file storage usage for the instance in bytes rounded down to the most significant digit */
    public ?\number $bytes;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->bytes = $data['bytes'];
        return $this;
    }
}
