<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StatusOK
{
    /** Will contain "ok" if the request was successful and there was nothing else to return */
    public ?string $status;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['status'] */
        if (isset($data['status'])) $this->status = $data['status'];
        return $this;
    }
}
