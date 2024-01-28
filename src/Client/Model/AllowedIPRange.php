<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AllowedIPRange
{
    /** An IP address range in CIDR notation */
    public ?string $CIDRBlock;

    /** A description for the CIDRBlock */
    public ?string $Description;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['CIDRBlock'] */
        if (isset($data['CIDRBlock'])) $this->CIDRBlock = $data['CIDRBlock'];
        /** @var string $data['Description'] */
        if (isset($data['Description'])) $this->Description = $data['Description'];
        return $this;
    }
}
