<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FilesLimits
{
    public function __construct(
        public ?int $total_storage = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['total_storage'] */
            if (isset($data['total_storage'])) $this->total_storage = $data['total_storage'];
        return $this;
    }
}
