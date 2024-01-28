<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IntegrationsLimits
{
    public ?int $enabled;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->enabled = $data['enabled'];
        return $this;
    }
}
