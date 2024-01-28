<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IntegrationsLimits
{
    public ?int $enabled;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->enabled = $data['enabled'];
        return $this;
    }
}
