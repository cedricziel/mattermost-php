<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FilesLimits
{
    public ?int $total_storage;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->total_storage = $data['total_storage'];
        return $this;
    }
}
