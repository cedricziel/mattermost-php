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
        $this->name = $data['name'];
        $this->value = $data['value'];
        return $this;
    }
}
