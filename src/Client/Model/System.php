<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class System
{
    /** System property name */
    public ?string $name;

    /** System property value */
    public ?string $value;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['value'] */
        if (isset($data['value'])) $this->value = $data['value'];
        return $this;
    }
}
