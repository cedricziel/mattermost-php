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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AllowedIPRange The hydrated instance
     */
    public static function hydrate(?array $data): AllowedIPRange
    {
        $data ??= [];

        return new self(
            CIDRBlock: $data['CIDRBlock'] ?? null,
            Description: $data['Description'] ?? null,
        );
    }
}
