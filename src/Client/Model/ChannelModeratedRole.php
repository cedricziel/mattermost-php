<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRole
{
    public ?bool $value;
    public ?bool $enabled;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->value = $data['value'];
        $this->enabled = $data['enabled'];
        return $this;
    }
}
