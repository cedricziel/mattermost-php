<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AllowedIPRange
{
    public function __construct(
        /** An IP address range in CIDR notation */
        public ?string $CIDRBlock = null,
        /** A description for the CIDRBlock */
        public ?string $Description = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            CIDRBlock: isset($data['CIDRBlock']) ? $data['CIDRBlock'] : null,
            Description: isset($data['Description']) ? $data['Description'] : null,
        );
        return $object;
    }
}
