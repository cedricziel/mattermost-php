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
        /** @var bool $data['value'] */
        if (isset($data['value'])) $this->value = $data['value'];
        /** @var bool $data['enabled'] */
        if (isset($data['enabled'])) $this->enabled = $data['enabled'];
        return $this;
    }
}
