<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FilesLimits
{
    public ?int $total_storage;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->total_storage = $data['total_storage'];
        return $this;
    }
}
